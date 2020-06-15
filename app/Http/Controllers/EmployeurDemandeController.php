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
use Auth;
use Validator;

class EmployeurDemandeController extends Controller
{
    public function get_demande_reçu_emplyeur(){
        $c = Employeur::find(Auth::user()->id);
        $article = \DB::table('demande_emploies')->where('employeur_id', $c->id)->orderBy('created_at','desc')->paginate(5);
        $employeur = \DB::table('clients')->get(); 
        $produit = \DB::table('annonce_emploies')->get(); 

        return view('demande_emploi_reçu_employeur',['article'=>$article, 'idAdmin' => $c->id,'emploC' => $employeur,'prV' => $produit]);
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
