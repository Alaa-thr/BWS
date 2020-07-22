<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employeur;
use App\User;
use App\Annonce_emploie;
use App\Imageproduit;
use App\Demande_emploie;
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
        ->join('annonce_emploies','annonce_emploies.id','=','demande_emploies.annonceE_id')
        ->select('demande_emploies.id','annonce_emploies.libellé',\DB::raw('DATE(demande_emploies.created_at) as date'))
        ->where([['demande_emploies.employeur_id', $c->id],['demande_emploies.demmande_traiter',0],['demandeDEmpl',0]])->orderBy('demande_emploies.created_at','desc')->paginate(5);
        $employeur = \DB::table('clients')->get(); 
        $produit = \DB::table('annonce_emploies')->get(); 

       
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();

        return view('demande_emploi_reçu_employeur',['article'=>$article, 'idAdmin' => $c->id,'emploC' => $employeur,'prV' => $produit,'categorie'=>$categorie ,'categorieE'=>$categorieE]);
    } 
     public function detaillsdemandeReçuEmplyeur(Request $request){
        $empl = Employeur::find(Auth::user()->id);
        $demande_detaills = \DB::table('demande_emploies')->where([['id', $request->idA],['employeur_id',$empl->id]])
        ->select('demande_emploies.*',\DB::raw('DATE(demande_emploies.created_at) as date'))
        ->get();

        $annonce = \DB::table('demande_emploies')
        ->join("annonce_emploies",'annonce_emploies.id','=','demande_emploies.annonceE_id')
        ->where('demande_emploies.id', $request->idA)
        ->select('annonce_emploies.*')
        ->get();

        return  ['demande_detaills'=>$demande_detaills,'annonce'=>$annonce];
    }

     public function deleteDemandeReçuEmployeur($id){
        $demande = Demande_emploie::find($id);
        $demande->demandeDEmpl=1;
        $demande->save();
        return Response()->json(['etat' => true]);
    }
}