<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employeur;
use App\User;
use App\Annonce_emploie;
use App\Imageproduit;
use App\ColorProduit;
use App\TailleProduit;
use Illuminate\Support\Facades\Storage;
use DB;
use Auth;
use Validator;

class EmployeurDemandeController extends Controller
{
    public function get_demande_reçu_emplyeur(){
        $c = Employeur::find(Auth::user()->id);
        $article = \DB::table('demande_emploies')
        ->join('clients','clients.id','=','demande_emploies.client_id')
        ->join('annonce_emploies','annonce_emploies.id','=','demande_emploies.annonceE_id')
        ->select('demande_emploies.id','annonce_emploies.libellé','clients.nom','clients.prenom',\DB::raw('DATE(demande_emploies.created_at) as date'))
        ->where('demande_emploies.employeur_id', $c->id,'commandec.demmande_traiter===0')->orderBy('demande_emploies.created_at','desc')->paginate(5);
        $employeur = \DB::table('clients')->get(); 
        $produit = \DB::table('annonce_emploies')->get(); 

       
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();

        return view('demande_emploi_reçu_employeur',['article'=>$article, 'idAdmin' => $c->id,'emploC' => $employeur,'prV' => $produit,'categorie'=>$categorie ,'categorieE'=>$categorieE]);
    } 
    public function detaillsdemandeReçuEmplyeur(Request $request){
        $commande_detaills = \DB::table('demande_emploies')->where('id', $request->idA)->get();
        return  $commande_detaills;
    }

    public function deleteDemandeReçuEmployeur($id){
        $commande = Demande::find($id);
        $commande->delete();
        return Response()->json(['etat' => true]);
    }
}
