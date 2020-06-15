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

Route::get('/logoutregister', 'Auth\LoginController@logoutRegister')->name("logoutregister");
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/accueil', 'BwsController@accueil')->name('accueil');
Route::get('/apropos', 'BwsController@apropos')->name('apropos');
Route::get('/shop', 'BwsController@produitVisiteur')->name('shop');
Route::get('/emploi', 'BwsController@emploi')->name('emploi');
Route::get('/article', 'BwsController@article')->name('article');
Route::get('/contact', 'BwsController@contact')->name('contact');
Route::get('/article_detaillé', 'BwsController@article_D')->name('article_D');
Route::get('/getville', 'BwsController@get_ville');
Route::get('/panierVisiteur', 'BwsController@panier_visiteur')->name('panierVisiteur');


/************************************************ Admin***********************************************/

Route::get('/admin', 'AdminController@admin_admin')->name('admin');
Route::get('/articlesAdmin', 'AdminController@article_admin')->name('articlesAdmin');
Route::get('/categoriesAdmin', 'AdminController@categories_admin')->name('categoriesAdmin');
Route::get('/shopCategories', 'AdminController@Shopcategories_admin');
Route::get('/emploiCategories', 'AdminController@Emploicategories_admin');

Route::get('/getsouscategories','AdminController@getSousCategories');
Route::post('/addsouscategorie','AdminController@addSousCategorie');
Route::put('/updatesouscategorie','AdminController@updateSousCategorieButton');
Route::delete('/deletesouscategorie/{id}','AdminController@deleteSousCategorie');
Route::get('/client', 'AdminController@client_admin')->name('client');
Route::get('/emails', 'BwsController@emails_admin')->name('emails');
Route::get('/employeur', 'AdminController@employeur_admin')->name('employeur');
Route::get('/notificationsAdmin', 'AdminController@notifications_admin')->name('notificationsAdmin');
Route::get('/profilAdmin', 'AdminController@profil_admin')->name('profilAdmin');
Route::get('/statistiquesAdmin', 'BwsController@statistiques_admin')->name('statistiquesAdmin');
Route::get('/vendeur', 'AdminController@vendeur_admin')->name('vendeur');
Route::put('/updateProfilA/{id}','AdminController@update_profil');
Route::post('/addarticle', 'AdminController@addArticle');
Route::post('/detaillsarticle', 'AdminController@detaillsArticle');
Route::post('/addcategorie', 'AdminController@addCategorie');
Route::put('/updatecategorie','AdminController@updateCategorie');
Route::delete('/deletecategorie/{id}','AdminController@deleteCategorie');
Route::delete('/deletearticle/{id}','AdminController@deleteArticle');
Route::put('/updatearticle','AdminController@updateArticleButton');
Route::post('/addadmin', 'AdminController@addAdmin');
Route::post('detailsvendeur','AdminController@detailsVendeur');
Route::post('detailsemployeur','AdminController@detailsEmployeur');
Route::post('detailsclient','AdminController@detailsClient');
Route::post('detailsadmin','AdminController@detailsadmin');
Route::get('deleteclient/{id}','AdminController@deleteClient');
Route::get('deleteemployeur/{id}','AdminController@deleteEmployeur');
Route::get('deletvendeur/{id}','AdminController@deleteVendeur');
Route::get('deleteadmin/{id}','AdminController@deleteAdmin');
Route::get('recupervendeur','AdminController@recup_vendeur');
Route::get('recupconfirmer/{id}','AdminController@recupConfirmer');
Route::get('recuperclient','AdminController@recup_client');
Route::get('recupconfirmerc/{id}','AdminController@recupConfirmerc');
Route::get('recupemployeur','AdminController@recup_employeur');
Route::get('recupconfirmere/{id}','AdminController@recupConfirmerE');
Route::get('recuperadmin','AdminController@recup_admin');
Route::get('recupconfirmera/{id}','AdminController@recupConfirmerA');
Route::delete('/deletenotification/{id}','AdminController@deleteNotif');




/*********************************************** Employeur***********************************************/

Route::get('/profilEmployeur', 'EmployeurController@profil_employeur')->name('profilEmployeur');
Route::get('/annonceEmploi', 'BwsController@annonce_emploi_employeur')->name('annonceEmploi');
Route::put('/updateProfilE/{id}','EmployeurController@update_profil');

/*Demande traiter*/
Route::get('/demandeEmploiTraite','EmployeurController@get_commande_traiter_emplyeur')->name('demandeEmploiTraite');
Route::post('/detaillsacommandetraiteremplyeur', 'EmployeurController@detaillsacommandeTraiterEmplyeur'); 
Route::delete('/deletecommandetraiteremplyeur/{id}','EmployeurController@deleteCommandeTraiterEmployeur');

/*Demande Reçu*/
Route::get('/demandeEmploiRecu','EmployeurDemandeController@get_demande_reçu_emplyeur')->name('demandeEmploiRecu');
Route::post('/detaillsdemandereçuemplyeur', 'EmployeurDemandeController@detaillsdemandeReçuEmplyeur'); 
Route::delete('/deletedemandereçuemplyeur/{id}','EmployeurDemandeController@deleteDemandeReçuEmployeur');
/************************************************ Vendeur***********************************************/

Route::get('/statistiquesVendeur', 'BwsController@statistiques_vendeur')->name('statistiquesVendeur');
Route::get('/profilVendeur', 'VendeurController@profil_vendeur')->name('profilVendeur');
Route::put('/updateProfilV/{id}','VendeurController@update_profil');
Route::get('/produitVendeur', 'VendeurController@getProduit')->name('produitVendeur');
Route::post('/addproduit', 'VendeurController@addProduit');
Route::get('/getAllsouscategories/{id}','VendeurController@getSousCategories');
Route::get('/getAllcategories', 'VendeurController@getCategories');
Route::get('/getAllcolor', 'VendeurController@getColors');
/*commande reçu vendeur*/
Route::get('/commandeRecuVendeur','VendeurController@get_commande_vendeur')->name('commandeRecuVendeur');
Route::post('/detaillsacommandevendeur', 'VendeurController@detaillsacommandeVendeur'); 
Route::delete('/deletecommandevendeur/{id}','VendeurController@deleteCommandeVendeur');

/*commande traiter vendeur*/
Route::get('/commandeTraiterVendeur','VendeurCommandeController@get_commande_traiter_vendeur')->name('commandeTraiterVendeur');
Route::post('/detaillsacommandetraitervendeur', 'VendeurCommandeController@detaillsacommandeTraiterVendeur'); 
Route::delete('/deletecommandetraitervendeur/{id}','VendeurCommandeController@deleteCommandeTraiterVendeur');

/************************************************ Client***********************************************/
Route::get('/profilClient','ClientController@profil_clinet')->name('profilClient');
Route::get('/panierClient','BwsController@panier_client')->name('panierClient');
Route::put('/updateProfilC/{id}','ClientController@update_profil');
Route::post('/detaillsacommande', 'ClientController@detaillsCommande'); 
Route::get('/commandeClient','ClientController@get_commande_client')->name('commandeClient');
Route::delete('/deletecommande/{id}','ClientController@deleteCommande');
 /***Commande */
Route::get('/commandeClient','ClientController@get_commande_client')->name('commandeClient');
Route::post('/detaillsacommande', 'ClientController@detaillsCommande'); 
Route::delete('/deletecommande/{id}','ClientController@deleteCommande');
/*demande*/
Route::get('/demandeClient','DemandeClientController@get_demande_client')->name('demandeClient');
Route::post('/detaillsademande', 'DemandeClientController@detaillsDemande'); 
Route::delete('/deletedemande/{id}','DemandeClientController@deleteDemande');
Route::post('/addpanier','ClientController@addPanier');
Route::get('/panier','ClientController@ProduitCommande')->name('panier');

/*historique*/
Route::get('/historiqueClient','HistoriqurController@get_historique_client')->name('historiqueClient');
Route::delete('/deletehistorique/{id}','HistoriqurController@deleteHistorique');

/*Notification*/
Route::get('/notificationClient','NotificationController@get_notification_client')->name('notificationClient');
Route::delete('/deletenotificationclient/{id}','NotificationController@deleteNotificationClient');

/*Favoris*/
Route::post('/ajoutaufavoris/{id}','ClientController@AjoutAuFavoris');
Route::get('/favorisClient','FavorisController@get_favoris_client')->name('favorisClient');
Route::delete('/deletefavorisclient/{id}','FavorisController@deletefavorisClient');


