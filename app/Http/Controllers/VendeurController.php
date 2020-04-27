<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendeur;
use App\User;
use Auth;

class VendeurController extends Controller
{
     public function profil_vendeur(){
        $vendeur=Vendeur::find(Auth::user()->id); 
        return view('profil_vendeur',['vendeur'=>$vendeur]);
    }
    public function update_profil(Request $request, $id) {
                

        $vendeur = Vendeur::find(Auth::user()->id);
        $user = User::find(Auth::user()->id);

        $vendeur->Nom = $request->input('nom');
        $vendeur->Prenom = $request->input('prenom');
        $vendeur->numTelephone = $request->input('num');
        $vendeur->email = $request->input('adresse_email'); 
        $vendeur->Num_Compte_Banquaire = $request->input('bnq');
        $vendeur->Nom_boutique = $request->input('boutique');

        $user->numTelephone = $request->input('num');
        $user->email = $request->input('adresse_email');  
        
        $vendeur->save();
        $user->save();
       
        return redirect('profilVendeur');
    }



}