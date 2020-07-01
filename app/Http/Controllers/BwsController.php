<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Ville;
use App\User;
use App\Vendeur;
use App\Client;
use App\Employeur;
use App\Admin;
use App\Commande;
use App\Email;
use Auth;
use Redirect;

class BwsController extends Controller
{
    private $cat;
    private $art;
/************************************************ Visiteur***********************************************/   
     public function Connect(Request $request)
    {
        $users =  User::All();
        $i = 0;
        $typeCompte =  array();
        foreach ($users as $user) {
            if($user->email == $request->value || $user->numTelephone == $request->value){
                $i++;
                array_push($typeCompte,$user->type_compte);
            }
        }
        if($i > 1){
            return ['etat' => true, 'typeCompte' =>$typeCompte];
        }
        else{
            return ['etat' => false];
        }
        
    } 

     public function apropos()
    {
        return view('apropos');
    }

     public function produitVisiteur()
    {
        $produit = \DB::table('produits')
         ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
         ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*')
         ->get();       
        $imageproduit = \DB::table('imageproduits')->get();
        $color = \DB::table('colors')->join('color_produits', 'colors.id', '=', 'color_produits.color_id')->get();
        $taille = \DB::table('taille_produits')->get();
        $typeLivraison = \DB::table('typechoisirvendeurs')->get();
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
           
        return view('shop',['produit'=>$produit, 'ImageP' => $imageproduit, 'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille ,'categorie'=>$categorie]);
    }

    public function deposerProduit(){
        if(auth()->check() && Auth::user()->type_compte == 'v'){//return true id it's connect
            return ['etat' => 'cnnect'];
        }
        else if(auth()->check() && Auth::user()->type_compte != 'v'){
                return ['etat' => true];
        }
        else{
            return ['etat' => false];
        }
    }

    public function deposerEmploi(){
        if(auth()->check() && Auth::user()->type_compte == 'e'){
            return ['etat' => 'cnnect'];
        }
        else if(auth()->check() && Auth::user()->type_compte != 'e'){
                return ['etat' => true];
        }
        else{
            return ['etat' => false];
        }
    }

    public function getArticleHome(){
        $allArticle = \DB::table('articles')
        ->join('admins', 'admins.id', '=', 'articles.admin_id')
        ->select('admins.nom','admins.prenom','articles.*',\DB::raw('DATE(articles.created_at) as date'))
        ->orderBy('articles.created_at','desc')
        ->get(3) ;
        return ['allArticle' => $allArticle];
    }

    public function getProduitHome(){
         $produit = \DB::table('produits')
         ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
         ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*')
         ->take(24)->get();       
        $imageproduit = \DB::table('imageproduits')->get();
        $color = \DB::table('colors')->join('color_produits', 'colors.id', '=', 'color_produits.color_id')->get();
        $taille = \DB::table('taille_produits')->get();
        $typeLivraison = \DB::table('typechoisirvendeurs')->get();
        return ['produit'=>$produit, 'ImageP' => $imageproduit, 'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille ];
    }

    public function Estconnecter(){
        if( Auth::user()->type_compte == 'c'){
            return ['etat' => true];
        }
        else{
                return ['etat' => false];
        }

    }

    public function getCategorieHome(){

        $sousCatego = \DB::table('sous_categories')->get();
        $categorie = \DB::table('categories')->orderBy('libelle','asc')->get();
           
        return ['categorie'=>$categorie , 'sousCatego'=> $sousCatego];
       
        
    }

     public function emploi()
    {
        return view('emploi');
    }

     public function article()
    {
       $article = \DB::table('admins')->join('articles','admins.id','=','articles.admin_id')->orderBy('articles.created_at','desc')->get();
        return view('article',['ar' =>$article]);
    }
    public function contact()
    {
        return view('contact');
    }

     public function addEmail(Request $request)
    {
        $request->validate([
             'adresse_email' => ['required','string', 'max:50', 'min:5','email'],
             'message' => ['required','string','max:500','min:5','regex:/^[a-zA-Z0-9][a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
         ]);
         
        $email = new Email;
        
        $email->adresse_email = $request->adresse_email;
        $email->message = $request->message;
        
        $email->save();
        
        
        return Response()->json(['etat' => true, 'email' => $email]);
    }

     public function accueil()
    {
        return view('home');
    }

    /* public function article_D()
    {
        $article_D = \DB::table('admins')->join('articles','admins.id','=','articles.admin_id')->get();
        return view('article_detaille',['article_detaillé' => $article_D]);
    }*/
    public function aa()
    {
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        return View('article_detaille',['categorie' => $categorie]);
    }

    public function showArticleD($id)
    {
        
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $cat = $categorie;
       $art = \DB::table('articles')->where('id',$id)->get();
        return $this->aa();
    }

    public function get_ville(){
        $ville = Ville::all();
        return $ville;
    }
/*********************************************** Admin ***********************************************/

    public function admin_admin(){
        return view('admin_admin');
    }

    public function articles_admin(){
        return view('articles_admin');
    }

    public function categories_admin(){
        return view('categories_admin');
    }

    public function client_admin(){
        return view('client_admin');
    }

    public function emails_admin(){
        return view('emails_admin');
    }

    public function employeur_admin(){
        return view('employeur_admin');
    }

    public function notifications_admin(){
        return view('notifications_admin');
    }

    public function profil_admin(){
        return view('profil_admin');
    }

    public function statistiques_admin(){
        return view('statistiques_admin');
    }

    public function vendeur_admin(){
        return view('vendeur_admin');
    }

/************************************************ Employeur***********************************************/
   

    public function annonce_emploi_employeur(){
        return view('annonce_emploi_employeur');
    }

    public function profil_employeur(){
        return view('profil_employeur');
    }

    public function demande_emploi_reçu_employeur(){
        return view('demande_emploi_reçu_employeur');
    }

    public function demande_emploi_traite_employeur(){
        return view('demande_emploi_traite_employeur');
    }

/************************************************ Client***********************************************/

    public function profil_clinet(){
        return view('profil_clinet');
    }
    public function commande_client(){
        return view('commande_client');
    }

    public function historique_client(){
        return view('historique_client');
    }

    public function demande_clinet(){
        return view('demande_clinet');
    }

    public function panier_client(){
        return view('panier_client');
    }

    public function notification_client(){
        return view('notification_client');
    }

    public function favoris_client(){
        return view('favoris_client');
    }
   

/************************************************ Vendeur***********************************************/

    public function statistiques_vendeur(){
        return view('statistiques_vendeur');
    }

    public function profil_vendeur(){
        return view('profil_vendeur');
    }

    public function commande_traiter_vendeur(){
        return view('commande_traiter_vendeur');
    }
     public function commande_recu_vendeur(){
        return view('commande_recu_vendeur');
    }

}
