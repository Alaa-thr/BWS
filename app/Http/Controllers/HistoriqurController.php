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
    public function get_historique_client(){//fcnt qui retourné tout les articles qui sont dans la table "Article" et trie par ordre desc selon son dates de creations
        $c = Client::find(Auth::user()->id);//recuperé "user_id" de admin qui est connecter       
        $article = \DB::table('historiques')->where('client_id', $c->id)->orderBy('created_at','desc')->paginate(5) ;//recuperé les articles qui sont dans la table "Article" et trie par ordre desc selon son dates de creations et pour "->paginate(5)" c a d f kol page t'affichilek 5 ta3 les article  
        $imageproduit = \DB::table('produits')->get(); 
      
        $imageannonce = \DB::table('annonce_emploies')->get();       
        return view('historique_client',['article'=>$article, 'idAdmin' => $c->id,'ImageP' => $imageproduit,'ImageA' => $imageannonce]);//reteurné a la view "articles_admin" et les 2 attributs "article" (contient tout les articles) et "idAdmin" (id de l'admin cncté) 
    } 
    
    public function deleteHistorique($id){//fnct pour supprimer un article di 3ando un parametre di hoda id ta3 article di nssuprimiwah w tretourni un attributs "etat"(ida kan = true => la supprision n3amlt ghaya)
        $commande = Historique::find($id);//n7awes 3la l article di rena habin nsupprimiwah
        $commande->delete();
        return Response()->json(['etat' => true]);
    }
}
