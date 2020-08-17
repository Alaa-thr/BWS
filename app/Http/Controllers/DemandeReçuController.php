<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Annonce_emploie;
use App\User;
use App\Client;

class DemandeReçuController extends Controller
{
     public function __construct()
    {
        $this->middleware('logout.user');
        $this->middleware('login.employeur');
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

