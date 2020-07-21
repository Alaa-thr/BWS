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
        $article = \DB::table('commandes')
        ->where([['vendeur_id', $c->id],['commande_envoyee', 1],['commande_traiter', 1],['CmdVendeurDelete',0]])
        ->select('id')
        ->distinct('id')
        ->orderBy('created_at','desc')
        ->paginate(5);

        $ville=\DB::table('commandes')
        ->where([['commandes.vendeur_id', $c->id],['commande_envoyee', 1],['CmdVendeurDelete',0]])
        ->select("ville")
        ->get();
        $tarif =\DB::table('commandes')
            ->join("villes",'villes.nom','commandes.ville')
            ->join("tarif_livraisons",'tarif_livraisons.ville_id','villes.id')
            ->where([['commandes.vendeur_id', $c->id],['commande_envoyee', 1],['CmdVendeurDelete',0]])
            ->select('ville','commandes.prix_total','commandes.qte','tarif_livraisons.prix as tarif_prix')
            ->get();
        $prixx=array();
            $i=0;$j=0;
            foreach ($ville as $key) {
                $tarif =\DB::table('commandes')
                ->join("villes",'villes.nom','commandes.ville')
                ->join("tarif_livraisons",'tarif_livraisons.ville_id','villes.id')
                ->where([['commandes.vendeur_id', $c->id],['commande_envoyee', 1],['commandes.ville',$key->ville]])
                ->select('ville','commandes.prix_total','commandes.qte','tarif_livraisons.prix as tarif_prix')
                ->get();
                if(count($tarif)!=0){
                    $i++;
                    if($j!=0){
                        
                        $prix = \DB::table('commandes')
                        ->join("villes",'villes.nom','commandes.ville')
                        ->join("tarif_livraisons",'tarif_livraisons.ville_id','villes.id')
                        ->where([['commandes.vendeur_id', $c->id],['commande_envoyee', 1],['commandes.ville',$key->ville],['CmdVendeurDelete',0]])
                        ->select('commandes.id',\DB::raw('sum((commandes.prix_total * commandes.qte)+tarif_livraisons.prix) as PrixTotal'))
                        ->groupBy('commandes.id')
                        ->orderBy('commandes.created_at','desc')
                        ->get();
                        
                        array_push($prixx,$prix[0]);
                    }
                    else{
                        $prix = \DB::table('commandes')
                        ->join("villes",'villes.nom','commandes.ville')
                        ->join("tarif_livraisons",'tarif_livraisons.ville_id','villes.id')
                        ->where([['commandes.vendeur_id', $c->id],['commande_envoyee', 1],['commandes.ville',$key->ville]])
                        ->select('commandes.id',\DB::raw('sum((commandes.prix_total * commandes.qte)+tarif_livraisons.prix) as PrixTotal'))
                        ->groupBy('commandes.id')
                        ->orderBy('commandes.created_at','desc')
                        ->get()
                        ->toArray();

                        array_push($prixx,$prix[0]);
                    }
                   
               
               }
                else{
                    $j++;
                    if($i!=0){
                        $prix = \DB::table('commandes')
                        ->where([['commandes.vendeur_id', $c->id],['commande_envoyee', 1],['commandes.ville',$key->ville]])
                        ->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as PrixTotal'),'commandes.id')
                        ->groupBy('id')
                        ->orderBy('created_at','desc')
                        ->get();
                        
                        array_push($prixx,$prix[0]);
                    }
                    else{
                         $prix = \DB::table('commandes')
                        
                        ->where([['commandes.vendeur_id', $c->id],['commande_envoyee', 1],['commandes.ville',$key->ville]])
                        ->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as PrixTotal'),'commandes.id')
                        ->groupBy('id')
                        ->orderBy('created_at','desc')
                        ->get()
                        ->toArray();
                        array_push($prixx,$prix[0]);
                    } 

                    
                }

            }
        $cmd =\DB::table('commandes')
        ->join('clients','clients.id','=','commandes.client_id')
        ->where('commandes.vendeur_id',$c->id)
        ->select('commandes.*','clients.nom','clients.prenom',\DB::raw('DATE(commandes.created_at) as date'))
        ->get();  
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $employeur = \DB::table('clients')->get(); 
        $produit = \DB::table('produits')->get(); 

        
        return view('commande_traiter_vendeur',['article'=>$article, 'idAdmin' => $c->id,'emploC' => $employeur,'prV' => $produit,'categorie'=>$categorie ,'categorieE'=>$categorieE,'cmd'=>$cmd,'prixx'=>$prixx]);
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
