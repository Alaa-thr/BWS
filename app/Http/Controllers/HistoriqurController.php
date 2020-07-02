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
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();       
        return view('historique_client',['article'=>$article, 'idAdmin' => $c->id,'produitCL' => $produitss,'annoncemploiesCL' => $annoncemploies,'categorie'=>$categorie ,'categorieE'=>$categorieE]);
    } 
    
    public function deleteHistorique($id){
        $historique = Historique::find($id);
        $historique->delete();
        return Response()->json(['etat' => true]);
    }
}
