<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

/************************************************ Visiteur***********************************************/

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/accueil', 'BwsController@accueil')->name('accueil');
Route::get('/apropos', 'BwsController@apropos')->name('apropos');
Route::get('/shop', 'BwsController@shop')->name('shop');
Route::get('/emploi', 'BwsController@emploi')->name('emploi');
Route::get('/article', 'BwsController@article')->name('article');
Route::get('/contact', 'BwsController@contact')->name('contact');
Route::get('/article_detaillé', 'BwsController@article_D')->name('article_D');

/************************************************ Admin***********************************************/

Route::get('/admin', 'BwsController@admin_admin')->name('admin');
Route::get('/articlesAdmin', 'BwsController@articles_admin')->name('articlesAdmin');
Route::get('/categoriesAdmin', 'BwsController@categories_admin')->name('categoriesAdmin');
Route::get('/client', 'BwsController@client_admin')->name('client');
Route::get('/emails', 'BwsController@emails_admin')->name('emails');
Route::get('/employeur', 'BwsController@employeur_admin')->name('employeur');
Route::get('/notificationsAdmin', 'BwsController@notifications_admin')->name('notificationsAdmin');
Route::get('/profilAdmin', 'BwsController@profil_admin')->name('profilAdmin');
Route::get('/statistiquesAdmin', 'BwsController@statistiques_admin')->name('statistiquesAdmin');
Route::get('/vendeur', 'BwsController@vendeur_admin')->name('vendeur');

/************************************************ Employeur***********************************************/

Route::get('/demandeEmploiRecu', 'BwsController@demande_emploi_reçu_employeur')->name('demandeEmploiRecu');
Route::get('/profilEmployeur', 'BwsController@profil_employeur')->name('profilEmployeur');
Route::get('/annonceEmploi', 'BwsController@annonce_emploi_employeur')->name('annonceEmploi');
Route::get('/demandeEmploiTraite', 'BwsController@demande_emploi_traite_employeur')->name('demandeEmploiTraite');

/************************************************ Vendeur***********************************************/

Route::get('/statistiquesVendeur', 'BwsController@statistiques_vendeur')->name('statistiquesVendeur');
Route::get('/profilVendeur', 'BwsController@profil_vendeur')->name('profilVendeur');
Route::get('/produitVendeur', 'BwsController@produit_vendeur')->name('produitVendeur');
Route::get('/commandeTraiterVendeur', 'BwsController@commande_traiter_vendeur')->name('commandeTraiterVendeur');
Route::get('/commandeRecuVendeur', 'BwsController@commande_recu_vendeur')->name('commandeRecuVendeur');

/************************************************ Client***********************************************/

Route::get('profilClient','BwsController@profil_clinet')->name('profilClient');
Route::get('commandeClient','BwsController@commande_client')->name('commandeClient');
Route::get('historiqueClient','BwsController@historique_client')->name('historiqueClient');
Route::get('demandeClient','BwsController@demande_clinet')->name('demandeClient');
Route::get('panierClient','BwsController@panier_client')->name('panierClient');
Route::get('notificationClient','BwsController@notification_client')->name('notificationClient');
Route::get('favorisClient','BwsController@favoris_client')->name('favorisClient');