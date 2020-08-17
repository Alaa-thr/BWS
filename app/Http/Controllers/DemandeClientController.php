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
    public function __construct()
    {
        $this->middleware('logout.user');
        $this->middleware('login.client');
    }    
    public function get_demande_client(){
        if(!Auth::check()){
            return view('page_not_found',['categorie'=>\DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get() ,'categorieE'=>\DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get()]);
            
        }
        $c = Client::find(Auth::user()->id);
        $article = \DB::table('demande_emploies')
        ->where([['client_id', $c->id],['demandeDClient',0]])
        ->select('demande_emploies.*',\DB::raw('DATE(demande_emploies.created_at) as date'))
        ->orderBy('created_at','desc')->paginate(5) ;
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = \DB::table('commandes')->where([ ['client_id',$c->id],['commande_envoyee',0]])->get();
        $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
        }     
        return view('demande_clinet',['article'=>$article, 'idAdmin' => $c->id,'categorie'=>$categorie ,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale]);
    } 
    public function detaillsDemande(Request $request){
        $demande_detaills = \DB::table('demande_emploies')->where('id', $request->idA)
        ->select('demande_emploies.*',\DB::raw('DATE(demande_emploies.created_at) as date'))
        ->get();

        $annonce = \DB::table('demande_emploies')
        ->join("annonce_emploies",'annonce_emploies.id','=','demande_emploies.annonceE_id')
        ->where('demande_emploies.id', $request->idA)
        ->select('annonce_emploies.*')
        ->get();

        return  ['demande_detaills'=>$demande_detaills,'annonce'=>$annonce];
    }

    public function deleteDemande($id){
        $demande = Demande_emploie::find($id);
        $demande->demandeDClient=1;
        $demande->save();
        return Response()->json(['etat' => true]);
    }
 
}