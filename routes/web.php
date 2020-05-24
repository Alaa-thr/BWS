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
Route::get('/panierVisiteur', 'BwsController@panier_visiteur')->name('panierVisiteur');
Route::get('/getville', 'BwsController@get_ville');
/************************************************ Admin***********************************************/

Route::get('/admin', 'AdminController@admin_admin')->name('admin');
Route::get('/articlesAdmin', 'AdminController@article_admin')->name('articlesAdmin');
Route::get('/categoriesAdmin', 'AdminController@categories_admin')->name('categoriesAdmin');
Route::get('/getsouscategories','AdminController@sousCategories')->name('getsouscategories');

Route::get('/client', 'AdminController@client_admin')->name('client');
Route::get('/emails', 'BwsController@emails_admin')->name('emails');
Route::get('/employeur', 'AdminController@employeur_admin')->name('employeur');
Route::get('/notificationsAdmin', 'BwsController@notifications_admin')->name('notificationsAdmin');
Route::get('/profilAdmin', 'AdminController@profil_admin')->name('profilAdmin');
Route::get('/statistiquesAdmin', 'BwsController@statistiques_admin')->name('statistiquesAdmin');
Route::get('/vendeur', 'AdminController@vendeur_admin')->name('vendeur');
Route::put('/updateProfilA/{id}','AdminController@update_profil');
Route::post('/addarticle', 'AdminController@addArticle');
Route::post('/detaillsarticle', 'AdminController@detaillsArticle');
Route::post('/addcategorie', 'AdminController@addCategorie');
Route::put('/updatecategorie','AdminController@updateCategorie');
Route::delete('/deletecategorie/{id}','AdminController@deleteCategorie');
Route::get('/articlesAdmin?page=2','AdminController@article_admin');
Route::delete('/deletearticle/{id}','AdminController@deleteArticle');
Route::put('/updatearticle','AdminController@updateArticleButton');
Route::get('/deletvendeur/{id}','AdminController@deleteVendeur');
Route::post('/detailsvendeur','AdminController@detailsVendeur');
Route::get('/deleteclient/{id}','AdminController@deleteClient');
Route::post('/detailsclient','AdminController@detailsClient');
Route::get('/deleteemployeur/{id}','AdminController@deleteEmployeur');
Route::post('/detailsemployeur','AdminController@detailsEmployeur');
Route::get('/deleteadmin/{id}','AdminController@deleteAdmin');
Route::post('/detailsadmin','AdminController@detailsAdmin');
Route::get('/recupervendeur','AdminController@recup_vendeur')->name('recupervendeur');
Route::get('/recupconfirmer/{id}','AdminController@recupConfirmer');
Route::get('/recuperclient','AdminController@recup_client')->name('recuperclient');
Route::get('/recupconfirmerc/{id}','AdminController@recupConfirmerc');
Route::get('/recupemployeur','AdminController@recu_employeur')->name('recupemployeur');
Route::get('/recupconfirmere/{id}','AdminController@recupConfirmere');
Route::get('/recuperadmin','AdminController@recup_admin')->name('recuperadmin');
Route::get('/recupconfirmera/{id}','AdminController@recupConfirmera');
Route::post('/addadmin','AdminController@addAdmin');
/*********************************************** Employeur***********************************************/

Route::get('/demandeEmploiRecu', 'BwsController@demande_emploi_reçu_employeur')->name('demandeEmploiRecu');
Route::get('/profilEmployeur', 'EmployeurController@profil_employeur')->name('profilEmployeur');
Route::get('/annonceEmploi', 'BwsController@annonce_emploi_employeur')->name('annonceEmploi');
Route::get('/demandeEmploiTraite', 'BwsController@demande_emploi_traite_employeur')->name('demandeEmploiTraite');
Route::put('/updateProfilE/{id}','EmployeurController@update_profil');


/************************************************ Vendeur***********************************************/

Route::get('/statistiquesVendeur', 'BwsController@statistiques_vendeur')->name('statistiquesVendeur');
Route::get('/profilVendeur', 'VendeurController@profil_vendeur')->name('profilVendeur');
Route::get('/produitVendeur', 'BwsController@produit_vendeur')->name('produitVendeur');
Route::get('/commandeTraiterVendeur', 'BwsController@commande_traiter_vendeur')->name('commandeTraiterVendeur');
Route::get('/commandeRecuVendeur', 'BwsController@commande_recu_vendeur')->name('commandeRecuVendeur');
Route::put('/updateProfilV/{id}','VendeurController@update_profil');
Route::get('/produitVendeur', 'VendeurController@getProduit')->name('produitVendeur');
Route::post('/addproduit', 'VendeurController@addProduit');
Route::get('/getAllsouscategories/{id}','VendeurController@getSousCategories');
Route::get('/getAllcategories', 'VendeurController@getCategories');
Route::get('/getAllcolor', 'VendeurController@getColors');


/************************************************ Client***********************************************/

Route::get('/profilClient','ClientController@profil_clinet')->name('profilClient');
Route::get('/commandeClient','BwsController@commande_client')->name('commandeClient');
Route::get('/historiqueClient','BwsController@historique_client')->name('historiqueClient');
Route::get('/demandeClient','BwsController@demande_clinet')->name('demandeClient');
Route::get('/panierClient','BwsController@panier_client')->name('panierClient');
Route::get('/notificationClient','BwsController@notification_client')->name('notificationClient');
Route::get('/favorisClient','BwsController@favoris_client')->name('favorisClient');
Route::put('/updateProfilC/{id}','ClientController@update_profil');







