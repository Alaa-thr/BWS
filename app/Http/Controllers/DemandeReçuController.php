<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Annonce_emploie;
use App\User;
use App\Client;

class DemandeReçuController extends Controller
{
     public function demandeReçu(){
        $d = Employeur::find(Auth::user()->id);
        $demande = \DB::table('demande_emploies')->where('employeur_id', $d->id)->orderBy('created_at','desc')->paginate(5);
        $clients = \DB::table('clients')->get(); 
        $annonces = \DB::table('annonce_emploies')->get(); 

        return view('demande_emploi_reçu_employeur',['demande'=>$demande, 'idEmployeur' => $d->id,'emploD' => $clients,'annD' => $annonces]);
    } 
    public function detaillsDemandeReçu(Request $request){
        $demmande_detaills = \DB::table('demande_emploies')->where('id', $request->idD)->get();
        return  $demande_detaills;
    }

    public function deleteDemandeReçu($id){
        $demmande = Demande::find($id);
        $demmande->delete();
        return Response()->json(['etat' => true]);
    }
}

