<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employeur;
use App\User;
use Auth;


class EmployeurController extends Controller
{
     public function profil_employeur(){
        $employeur=Employeur::find(Auth::user()->id); 
        return view('profil_employeur',['employeur'=>$employeur]);
    }
   public function update_profil(Request $request, $id) {
                

        $employeur = Employeur::find(Auth::user()->id);
        $user = User::find(Auth::user()->id);

        $employeur->nom = $request->input('nom');
        $employeur->prenom = $request->input('prenom');
        $employeur->num_tel = $request->input('num');
        $employeur->email = $request->input('adresse_email'); 
        $employeur->nom_societe = $request->input('societe');

        $user->numTelephone = $request->input('num');
        $user->email = $request->input('adresse_email');  
        
        $employeur->save();
        $user->save();
       
        return redirect('profilEmployeur');
    }


}