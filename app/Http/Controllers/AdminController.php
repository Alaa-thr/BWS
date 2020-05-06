<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Vendeur;
use App\Client;
use App\Employeur;
use App\Article;
use App\User;
use Auth;

class AdminController extends Controller
{
     public function profil_admin(){
        $admin=Admin::find(Auth::user()->id); 
        return view('profil_admin',['admin'=>$admin]);
    }

    public function vendeur_admin(){
        $vendeur = Vendeur::all(); 
        return view('vendeur_admin',['vendeur'=>$vendeur]);
    }

    public function client_admin(){
        $client = Client::all(); 
        return view('client_admin',['client'=>$client]);
    }

    public function employeur_admin(){
        $employeur = Employeur::all(); 
        return view('employeur_admin',['employeur'=>$employeur]);
    }

    public function admin_admin(){
        $admin = Admin::all(); 
        return view('admin_admin',['admin'=>$admin]);
    }

    public function article_admin(){
        $c = Admin::find(Auth::user()->id);       
        $article = \DB::table('articles')->where('admin_id', $c->id)->orderBy('created_at','desc')->get();
        
        return view('articles_admin',['article'=>$article]);  

    }
    public function detaillsArticle(Request $request){
        $article_detaills = \DB::table('articles')->where('id', $request->id)->get();
        echo "$request->id";
        return view('articles_admin',['article_detaills' => $article_detaills]);

    }
     public function addArticle(Request $request){

        $article2 = new Article;
        $article2->titre = $request->titre;
        $article2->description = $request->description;
        $article2->admin_id = $request->admin_id;

        $article2->save();

        return Response()->json(['etat' => true,'id' => $article2->id]);
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
