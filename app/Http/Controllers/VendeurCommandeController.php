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
    public function __construct()
    {
        $this->middleware('logout.user');
        $this->middleware('login.vendeur');
    }
    public function get_commande_traiter_vendeur(){
       if(!Auth::check()){
            return view('page_not_found',['categorie'=>\DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get() ,'categorieE'=>\DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get()]);
            
        }
        $c = Vendeur::find(Auth::user()->id);
        $article = \DB::table('commandes')
        ->where([['vendeur_id', $c->id],['commande_envoyee', 1],['commande_traiter', 1],['CmdVendeurDelete',0]])
        ->select('id')
        ->distinct('id')
        ->orderBy('created_at','desc')
        ->paginate(5);

        $prixx =\DB::table('commandes')
            ->join("villes",'villes.nom','commandes.ville')
            ->where([['commandes.vendeur_id', $c->id],['commande_envoyee', 1]])
            ->select('commandes.prix_produit','commandes.qte','commandes.vendeur_id','commandes.id','ville','client_id','commandes.type_livraison')
            ->get();
        $tarif =\DB::table('tarif_livraisons')
            ->join("villes",'villes.id','tarif_livraisons.ville_id')
            ->where([['tarif_livraisons.vendeur_id', $c->id]])
            ->select('tarif_livraisons.*','villes.nom')
            ->get(); 
        $cmd =\DB::table('commandes')
        ->join('clients','clients.id','=','commandes.client_id')
        ->where('commandes.vendeur_id',$c->id)
        ->select('commandes.*','clients.nom','clients.prenom',\DB::raw('DATE(commandes.created_at) as date'))
        ->get();  
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $employeur = \DB::table('clients')->get(); 
        $produit = \DB::table('produits')->get(); 

        
        return view('commande_traiter_vendeur',['article'=>$article, 'idAdmin' => $c->id,'emploC' => $employeur,'prV' => $produit,'categorie'=>$categorie ,'categorieE'=>$categorieE,'cmd'=>$cmd,'prixx'=>$prixx,'tarif'=>$tarif]);
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
