<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\Demande_emploie;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Rules\ModifieTextDescriptionArticle;
use App\User;
use Auth;

class DemandeClientController extends Controller
{
     
    public function get_demande_client(){
        $c = Client::find(Auth::user()->id);
        $article = \DB::table('demande_emploies')->where('client_id', $c->id)->orderBy('created_at','desc')->paginate(5) ;
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = \DB::table('commandes')->where([ ['client_id',$c->id],['commande_envoyee',0]])->get();     
        return view('demande_clinet',['article'=>$article, 'idAdmin' => $c->id,'categorie'=>$categorie ,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command]);
    } 
    public function detaillsDemande(Request $request){
        $demande_detaills = \DB::table('demande_emploies')->where('id', $request->idA)->get();
        return  $demande_detaills;
    }

    public function deleteDemande($id){
        $demande = Demande_emploie::find($id);
        $demande->delete();
        return Response()->json(['etat' => true]);
    }
 
}