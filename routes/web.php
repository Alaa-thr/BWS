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

Route::get('/', 'BwsController@home');

Auth::routes();

/************************************************ Visiteur***********************************************/

Route::get('/logoutregister', 'Auth\LoginController@logoutRegister')->name("logoutregister");
Route::post('/authenticate', 'Auth\LoginController@authenticate')->name("authenticate");
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/accueil', 'BwsController@accueil')->name('accueil');
Route::get('/apropos', 'BwsController@apropos')->name('apropos');
Route::get('/shop', 'BwsController@produitVisiteur')->name('shop');
Route::get('/emploi', 'BwsController@emploi')->name('emploi');
Route::post('detailsemp','BwsController@detailsEmploi');
Route::get('/article', 'BwsController@article')->name('article');
Route::get('/contact','BwsController@contact')->name('contact');
Route::post('/addemail', 'BwsController@addEmail')->name('addemail');

Route::get('/articleDetaille/{id}', 'BwsController@showArticleD');
Route::get('/getville', 'BwsController@get_ville');
Route::post('/getconnect', 'BwsController@Connect');
Route::get('/deposerproduit', 'BwsController@deposerProduit')->name('deposerProduit');
Route::get('/deposeremploi', 'BwsController@deposerEmploi')->name('deposerEmploi');
Route::get('/getarticlehome', 'BwsController@getArticleHome');
Route::get('/getproduithome', 'BwsController@getProduitHome');
Route::get('/estconnecter', 'BwsController@Estconnecter');
Route::get('/getcategoriehome', 'BwsController@getCategorieHome');
Route::get('/getfavoris', 'BwsController@getFavoris');
Route::delete('/deleteproduitpanier/{id}', 'BwsController@deleteProduitPanier');
Route::post('/updateproduitpanier', 'BwsController@updateProduitPanier');

/************************************************ Admin***********************************************/
Route::get('/categoriesAdmin', 'AdminController@categories_admin');
Route::get('/admin', 'AdminController@admin_admin')->name('admin');
Route::get('/articlesAdmin', 'AdminController@article_admin')->name('articlesAdmin');
Route::get('/categories', 'AdminController@categories_admin')->name('categories');
Route::get('/shopCategories', 'AdminController@Shopcategories_admin');
Route::get('/emploiCategories', 'AdminController@Emploicategories_admin');

Route::get('/getsouscategories','AdminController@getSousCategories');
Route::post('/addsouscategorie','AdminController@addSousCategorie');
Route::put('/updatesouscategorie','AdminController@updateSousCategorieButton');
Route::delete('/deletesouscategorie/{id}','AdminController@deleteSousCategorie');
Route::get('/client', 'AdminController@client_admin')->name('client');
Route::get('/emails', 'AdminController@emails_admin')->name('emails');
Route::post('detailsemail','AdminController@detailsEmail');
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
Route::delete('/deleteemail/{id}','AdminController@deleteEmail');
Route::put('/emailrependu/{id}','AdminController@emailRependu');


/*********************************************** Employeur***********************************************/

Route::get('/profilEmployeur', 'EmployeurController@profil_employeur')->name('profilEmployeur');
Route::get('/annoncesemploi', 'EmployeurController@annonce_emploi')->name('annoncesemploi');
Route::put('/updateProfilE/{id}','EmployeurController@update_profil');
Route::post('/addannonce', 'EmployeurController@addAnnonce');
Route::post('/detaillsannonces', 'EmployeurController@detaillsAnnonce');
Route::put('/updateannonce','EmployeurController@updateAnnonceButton');
Route::delete('/deleteannonce/{id}','EmployeurController@deleteAnnonce');
Route::get('/getAllSouscategories/{id}','EmployeurController@getSousCategories');
Route::get('/getAllCategories', 'EmployeurController@getCategories');
Route::post('/detaillsdemandereçu', 'DemandeReçuController@detaillsDemandeReçu');
Route::delete('/deletedemandereçu/{id}','DemandeReçuController@deleteDemandeReçu');
/*Demande traiter*/
Route::get('/demandeEmploiTraite','EmployeurController@get_commande_traiter_emplyeur')->name('demandeEmploiTraite');
Route::post('/detaillsacommandetraiteremplyeur', 'EmployeurController@detaillsacommandeTraiterEmplyeur'); 
Route::delete('/deletecommandetraiteremplyeur/{id}','EmployeurController@deleteCommandeTraiterEmployeur');
Route::put('/recudemande/{id}','EmployeurController@RecuDemande');
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
Route::put('/recucommande/{id}','VendeurController@RecuCommande');
Route::put('/refusercommande/{id}','VendeurController@RefuserCommande');
Route::post('/addvilles','VendeurController@AjouterVillePrix');
Route::delete('/deleteproduit/{id}','VendeurController@deleteProduit');


/*commande traiter vendeur*/
Route::get('/commandeTraiterVendeur','VendeurCommandeController@get_commande_traiter_vendeur')->name('commandeTraiterVendeur');
Route::post('/detaillsacommandetraitervendeur', 'VendeurCommandeController@detaillsacommandeTraiterVendeur'); 
Route::delete('/deletecommandetraitervendeur/{id}','VendeurCommandeController@deleteCommandeTraiterVendeur');

/************************************************ Client***********************************************/
Route::get('/profilClient','ClientController@profil_clinet')->name('profilClient');
Route::put('/updateProfilC/{id}','ClientController@update_profil');
Route::post('/detaillsacommande', 'ClientController@detaillsCommande'); 
Route::get('/commandeClient','ClientController@get_commande_client')->name('commandeClient');
Route::get('/deletecommande/{id}','ClientController@deleteCommande');


/*demande*/
Route::get('/demandeClient','DemandeClientController@get_demande_client')->name('demandeClient');
Route::post('/detaillsademande', 'DemandeClientController@detaillsDemande'); 
Route::delete('/deletedemande/{id}','DemandeClientController@deleteDemande');
Route::post('/addpanier','ClientController@addPanier');
Route::get('/panier','ClientController@ProduitCommande')->name('panier');
Route::get('/panierdemmande','ClientController@panierDemmande');

/*historique*/
Route::get('/historiqueClient','HistoriqurController@get_historique_client')->name('historiqueClient');
Route::delete('/deletehistorique/{id}','HistoriqurController@deleteHistorique');
Route::post('/ajouterHistoProduit/{id}','ClientController@addHisto');

/*Notification*/
Route::get('/notificationClient','NotificationController@get_notification_client')->name('notificationClient');
Route::delete('/deletenotificationclient/{id}','NotificationController@deleteNotificationClient');

/*Favoris*/
Route::post('/ajoutaufavoris/{id}','ClientController@AjoutAuFavoris');
Route::delete('/deletefavorisclient/{id}','FavorisController@deletefavorisClient');
Route::get('/favorisClient', 'ClientController@getProduit')->name('favorisClient');
Route::post('/annonceaufavoris/{id}','ClientController@AnnonceAuFavoris');

//EnvoyerCommande
Route::post('/envoyercommande', 'ClientController@EnvoyerCommande');

/****************Vendeur******Client*******Admin******Employeur*******Visiteur**********/
//Search
Route::get('/abest', 'BwsController@getsearch')->name('abest');
Route::get('/abestv', 'BwsController@getsearchVisiteur')->name('abestv');




