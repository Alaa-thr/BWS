<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ville;
use App\Vendeur;
use App\Client;
use Auth;

class BwsController extends Controller
{

/************************************************ Visiteur***********************************************/   
     public function apropos()
    {
        return view('apropos');
    }

     public function shop()
    {
        return view('shop');
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
