<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendeur;
use App\Client;
use App\User;
use App\Produit;
use App\Imageproduit;
use App\ColorProduit;
use App\TailleProduit;
use Illuminate\Support\Facades\Storage;
use Auth;
use Validator;
class VendeurCommandeController extends Controller
{
    public function get_commande_traiter_vendeur(){
        $c = Vendeur::find(Auth::user()->id);
        $article = \DB::table('commandes')->where('vendeur_id', $c->id)->orderBy('created_at','desc')->paginate(5);
        $employeur = \DB::table('clients')->get(); 
        $produit = \DB::table('produits')->get(); 

        
        return view('commande_traiter_vendeur',['article'=>$article, 'idAdmin' => $c->id,'emploC' => $employeur,'prV' => $produit]);
    } 
    public function detaillsacommandeTraiterVendeur(Request $request){
        $commande_detaills = \DB::table('commandes')->where('id', $request->idA)->get();
        return  $commande_detaills;
    }

    public function deleteCommandeTraiterVendeur($id){
        $commande = Commande::find($id);
        $commande->delete();
        return Response()->json(['etat' => true]);
    }

}
