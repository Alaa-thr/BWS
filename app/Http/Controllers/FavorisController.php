<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\Favori;
use App\Annonce_emploie;
use App\Produit;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Rules\ModifieTextDescriptionArticle;
use App\User;
use Auth; 

class FavorisController extends Controller
{
    public function get_favoris_client(){
        $c = Client::find(Auth::user()->id);
        $article = \DB::table('favoris')
        ->where('client_id', $c->id)->orderBy('created_at','desc')->paginate(5);
        $annonce_emploies = \DB::table('annonce_emploies')->get(); 
        $produit = \DB::table('produits')->get();  
         $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();     
        return view('favoris_client',['article'=>$article, 'idAdmin' => $c->id,'annonceC' => $annonce_emploies,'produitC' => $produit,'categorie'=>$categorie ,'categorieE'=>$categorieE]);
    } 
    

    public function deletefavorisClient($id){
        $favoris = \DB::table('favoris')->where('produit_id', $id)->delete();
        
        
        return Response()->json(['etat' => true]);
    }
}
