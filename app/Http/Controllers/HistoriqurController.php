<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\Historique;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Rules\ModifieTextDescriptionArticle;
use App\User;
use Auth;

class HistoriqurController extends Controller
{
    public function get_historique_client(){
        $c = Client::find(Auth::user()->id);
        $article = \DB::table('historiques')->where('client_id', $c->id)->orderBy('created_at','desc')->paginate(10) ;
        $produitss = \DB::table('produits')->get(); 
        $annoncemploies = \DB::table('annonce_emploies')->get();       
        return view('historique_client',['article'=>$article, 'idAdmin' => $c->id,'produitCL' => $produitss,'annoncemploiesCL' => $annoncemploies]);
    } 
    
    public function deleteHistorique($id){
        $historique = Historique::find($id);
        $historique->delete();
        return Response()->json(['etat' => true]);
    }
}
