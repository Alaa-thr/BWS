<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Ville;
use App\Vendeur;
use App\Client;
use App\Employeur;
use App\Commande;
use App\Email;
use Auth;

class BwsController extends Controller
{

/************************************************ Visiteur***********************************************/   
     public function apropos()
    {
        return view('apropos');
    }

     public function produitVisiteur()
    {
        $produit = \DB::table('produits')->get();       
        $imageproduit = \DB::table('imageproduits')->get();
        $color = \DB::table('colors')->join('color_produits', 'colors.id', '=', 'color_produits.color_id')->get();
        $taille = \DB::table('taille_produits')->get();
        $typeLivraison = \DB::table('typechoisirvendeurs')->get();
        return view('shop',['produit'=>$produit, 'ImageP' => $imageproduit, 'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille ]);
    }

   

     public function emploi()
    {
        return view('emploi');
    }

     public function article()
    {
        return view('article');
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

     public function article_D()
    {
        return view('article_detaille');
    }

    public function panier_visiteur()
    {
        return view('panier_visiteur');
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
