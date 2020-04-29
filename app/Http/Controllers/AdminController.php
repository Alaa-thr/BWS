<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\User;
use Auth;

class AdminController extends Controller
{
     public function profil_admin(){
        $admin=Admin::find(Auth::user()->id); 
        return view('profil_admin',['admin'=>$admin]);
    }
    public function update_profil(Request $request, $id) {
                

        $admin = Admin::find(Auth::user()->id);
        $user = User::find(Auth::user()->id);

        $admin->nom = $request->input('nom');
        $admin->prenom = $request->input('prenom');
        $admin->numTelephone = $request->input('num');
        $admin->email = $request->input('adresse_email'); 
        $admin->numCarteBanquaire = $request->input('bnq');
     
        $user->numTelephone = $request->input('num');
        $user->email = $request->input('adresse_email');  
        
        $admin->save();
        $user->save();
       
        return redirect('profilAdmin');
    }

}
