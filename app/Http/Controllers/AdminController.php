<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Admin;
use App\Vendeur;
use App\Client;
use App\Employeur;
use App\Article;
use App\User;
use App\Categorie;
use App\SousCategorie;
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
        
        return view('articles_admin',['article'=>$article, 'idArticle' => $c->id]);  

    }
    public function detaillsArticle(Request $request){
        $article_detaills = \DB::table('articles')->where('id', $request->idA)->get();
        return  $article_detaills;

    }
     public function addArticle(Request $request){

        $article2 = new Article;
        $article2->titre = $request->titre;
        $article2->description = $request->description;
        $article2->admin_id = $request->admin_id;
        
        $article2->save();

        return Response()->json(['etat' => true,'articleAjout' => $article2]);
    }
     public function deleteArticle($id){
        $article = Article::find($id);
        $article->delete();

     return Response()->json(['etat' => $article]);
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
    public function categories_admin(){
        $cat = Categorie::all();
        $nabil = \DB::table('categories')->orderBy('created_at','desc')->get();
        return view('categories_admin',['categorie'=>$nabil]);
    }
        
    public function addCategorie(Request $request){
        $categorie = new Categorie;

        $categorie->libellé = $request->libellé;

        $categorie->save();

        return Response()->json(['etat' => true, 'id' => $categorie]);
    }
    public function updateCategorie(Request $request){
        $categorie = Categorie::find($request->id);

        $categorie->libellé = $request->libellé;

        $categorie->save();

        return Response()->json(['etat' => true]);
    
    }
    public function deleteCategorie($id){
        $categorie = Categorie::find($id);
        $categorie->delete();

     return Response()->json(['etat' => $categorie]);
    }
    public function sousCategories(){
        $scat = SousCategorie::all();
        echo "$scat";
        return $scat;
    }
   
   


}
