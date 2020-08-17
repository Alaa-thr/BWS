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
Route::get('/confirmation', 'BwsController@nexmo')->name('confirmation');
Route::get('/sendsms', 'BwsController@sendSms');
Route::post('/number_confirm', 'BwsController@redirectTo');
Route::fallback(function() {
	$categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
   return view('page_not_found',['categorieE'=>$categorieE,'categorie'=>$categorie ]); // la vue
});
Auth::routes();

/************************************************ Visiteur***********************************************/
Route::get('/dynamic_pdf/pdf/{id}', 'PDFController@pdf');
Route::get('/compte', 'BwsController@desactivate')->name("compte");
Route::get('/logoutregister', 'Auth\LoginController@logoutRegister')->name("logoutregister");
Route::post('/authenticate', 'Auth\LoginController@authenticate')->name("authenticate");
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/accueil', 'BwsController@accueil')->name('accueil');
Route::get('/apropos', 'BwsController@apropos')->name('apropos');
Route::get('/shop', 'BwsController@produitVisiteur')->name('shop');
Route::get('/emploi', 'BwsController@emploi')->name('emploi');

Route::get('/shop/search_categorie={id}', 'BwsController@shopSearch')->name('shopCategorie');

Route::get('/shop/search_categorie={id}/sous-categorie={id1}', 'BwsController@shopSousCategorieSearch');
/************************************* COULEUR***********************************/

Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}', 'BwsController@shopSousCategorieColorSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/taille={tail}', 'BwsController@shopSousCategorieColorTSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/prix={prx}', 'BwsController@shopSousCategorieColorPSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/taille={tail}/prix={prx}', 'BwsController@shopSousCategorieColorTPrSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/prix={prx}/taille={tail}', 'BwsController@shopSousCategorieColorPTSearch');

//Couleur*Prix
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/prix={prx}/ville={vil}', 'BwsController@shopSousCategorieColorPrVSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/prix={prx}/type_livraison={type}', 'BwsController@shopSousCategorieColorPrTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/prix={prx}/ville={vil}/type_livraison={type}', 'BwsController@shopSousCategorieColorPrVTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/prix={prx}/type_livraison={type}/ville={vil}', 'BwsController@shopSousCategorieColorPrTLVSearch');


//Couleur*Prix*Taille
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/prix={prx}/taille={tail}/ville={vil}', 'BwsController@shopSousCategorieColorPTVSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/prix={prx}/taille={tail}/type_livraison={type}', 'BwsController@shopSousCategorieColorPTTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/prix={prx}/taille={tail}/ville={vil}/type_livraison={type}', 'BwsController@shopSousCategorieColorPTVTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/prix={prx}/taille={tail}/type_livraison={type}/ville={vil}', 'BwsController@shopSousCategorieColorPTTLVSearch');

//Couleur*Taille*Prix
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/taille={tail}/prix={prx}/ville={vil}', 'BwsController@shopSousCategorieColorTPrVSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/taille={tail}/prix={prx}/type_livraison={type}', 'BwsController@shopSousCategorieColorTPrTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/taille={tail}/prix={prx}/ville={vil}/type_livraison={type}', 'BwsController@shopSousCategorieColorTPrVTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/taille={tail}/prix={prx}/type_livraison={type}/ville={vil}', 'BwsController@shopSousCategorieColorTPrTLVSearch');

//Couleur
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/ville={vil}', 'BwsController@shopSousCategorieColorVSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/type_livraison={type}', 'BwsController@shopSousCategorieColorTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/ville={vil}/type_livraison={type}', 'BwsController@shopSousCategorieColorVTLTSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/type_livraison={type}/ville={vil}', 'BwsController@shopSousCategorieColorTLVTPrSearch');

//Couleur*Taille
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/taille={tail}/ville={vil}', 'BwsController@shopSousCategorieColorTVSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/taille={tail}/type_livraison={type}', 'BwsController@shopSousCategorieColorTTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/taille={tail}/ville={vil}/type_livraison={type}', 'BwsController@shopSousCategorieColorTVTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/couleur={coul}/taille={tail}/type_livraison={type}/ville={vil}', 'BwsController@shopSousCategorieColorTTLVSearch');

/************************************* TAILLE***********************************/
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}', 'BwsController@shopSousCategorieTailleSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/couleur={coul}', 'BwsController@shopSousCategorieTailleCSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/prix={prx}', 'BwsController@shopSousCategorieTaillePSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/couleur={coul}/prix={prx}', 'BwsController@shopSousCategorieTailleCPSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/prix={prx}/couleur={coul}', 'BwsController@shopSousCategorieTaillePCSearch');

//Taill*Prix*Couleur
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/prix={prx}/couleur={coul}/ville={vil}', 'BwsController@shopSousCategorieTaillePCVSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/prix={prx}/couleur={coul}/type_livraison={type}', 'BwsController@shopSousCategorieTaillePCTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/prix={prx}/couleur={coul}/ville={vil}/type_livraison={type}', 'BwsController@shopSousCategorieTaillePCVTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/prix={prx}/couleur={coul}/type_livraison={type}/ville={vil}', 'BwsController@shopSousCategorieTaillePCTLVSearch');

//Taill*Couleur*Prix
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/couleur={coul}/prix={prx}/ville={vil}', 'BwsController@shopSousCategorieTailleCPVSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/couleur={coul}/prix={prx}/type_livraison={type}', 'BwsController@shopSousCategorieTailleCPTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/couleur={coul}/prix={prx}/ville={vil}/type_livraison={type}', 'BwsController@shopSousCategorieTailleCPVTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/couleur={coul}/prix={prx}/type_livraison={type}/ville={vil}', 'BwsController@shopSousCategorieTailleCPTLVSearch');

//Taill*Prix
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/prix={prx}/ville={vil}', 'BwsController@shopSousCategorieTaillePVSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/prix={prx}/type_livraison={type}', 'BwsController@shopSousCategorieTaillePTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/prix={prx}/ville={vil}/type_livraison={type}', 'BwsController@shopSousCategorieTaillePVTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/prix={prx}/type_livraison={type}/ville={vil}', 'BwsController@shopSousCategorieTaillePTLVSearch');

//Taill*Couleur
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/couleur={coul}/ville={vil}', 'BwsController@shopSousCategorieTailleCVSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/couleur={coul}/type_livraison={type}', 'BwsController@shopSousCategorieTailleCTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/couleur={coul}/ville={vil}/type_livraison={type}', 'BwsController@shopSousCategorieTailleCVTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/couleur={coul}/type_livraison={type}/ville={vil}', 'BwsController@shopSousCategorieTailleTLVCSearch');

//Taille
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/ville={vil}', 'BwsController@shopSousCategorieTailleVSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/type_livraison={type}', 'BwsController@shopSousCategorieTailleTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/ville={vil}/type_livraison={type}', 'BwsController@shopSousCategorieTailleVTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/taille={tail}/type_livraison={type}/ville={vil}', 'BwsController@shopSousCategorieTailleTLVSearch');

/************************************* PRIX***********************************/

Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}', 'BwsController@shopSousCategoriePrixSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/couleur={coul}', 'BwsController@shopSousCategoriePrixCSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/couleur={coul}/taille={tail}', 'BwsController@shopSousCategoriePrixCTSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/taille={tail}', 'BwsController@shopSousCategoriePrixTSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/taille={tail}/couleur={coul}', 'BwsController@shopSousCategoriePrixTCSearch');
//Prix

Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/ville={vil}', 'BwsController@shopSousCategoriePrixVSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/type_livraison={type}', 'BwsController@shopSousCategoriePrixTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/ville={vil}/type_livraison={type}', 'BwsController@shopSousCategoriePrixVTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/type_livraison={type}/ville={vil}', 'BwsController@shopSousCategoriePrixTLVSearch');


//Prix*Taille

Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/taille={tail}/ville={vil}', 'BwsController@shopSousCategoriePrixTVSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/taille={tail}/type_livraison={type}', 'BwsController@shopSousCategoriePrixTTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/taille={tail}/ville={vil}/type_livraison={type}', 'BwsController@shopSousCategoriePrixTVTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/taille={tail}/type_livraison={type}/ville={vil}', 'BwsController@shopSousCategoriePrixTTLVSearch');


//Prix*Coleur
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/couleur={coul}/ville={vil}', 'BwsController@shopSousCategoriePrixCVSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/couleur={coul}/type_livraison={type}', 'BwsController@shopSousCategoriePrixCTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/couleur={coul}/ville={vil}/type_livraison={type}', 'BwsController@shopSousCategoriePrixCVTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/couleur={coul}/type_livraison={type}/ville={vil}', 'BwsController@shopSousCategoriePrixCTLVSearch');


//Prix*Taille*Couleur
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/taille={tail}/couleur={coul}/ville={vil}', 'BwsController@shopSousCategoriePrixTCVSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/taille={tail}/couleur={coul}/type_livraison={type}', 'BwsController@shopSousCategoriePrixTCTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/taille={tail}/couleur={coul}/ville={vil}/type_livraison={type}', 'BwsController@shopSousCategoriePrixTCVTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/taille={tail}/couleur={coul}/type_livraison={type}/ville={vil}', 'BwsController@shopSousCategoriePrixTCTLVSearch');



//Prix*Couleur*Taille
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/couleur={coul}/taille={tail}/ville={vil}', 'BwsController@shopSousCategoriePrixCTVSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/couleur={coul}/taille={tail}/type_livraison={type}', 'BwsController@shopSousCategoriePrixCTTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/couleur={coul}/taille={tail}/ville={vil}/type_livraison={type}', 'BwsController@shopSousCategoriePrixCTVTLSearch');
Route::get('/shop/search_categorie={id}/sous-categorie={id1}/prix={prx}/couleur={coul}/taille={tail}/type_livraison={type}/ville={vil}', 'BwsController@shopSousCategoriePrixCTTLVSearch');









Route::get('/emploi/search_categorie={id}', 'BwsController@emploiSearch')->name('emploiCategorie');

Route::get('/emploi/search_categorie={id}/sous-categorie={id1}', 'BwsController@emploiSousCategorieSearch');

Route::get('/emploi/search_categorie={id}/ville={id1}', 'BwsController@emploiVilleSearch');

Route::get('/emploi/search_categorie={id}/sous-categorie={id1}/ville={id2}', 'BwsController@emploiSousCategoVilleSearch');

Route::get('/emploi/search_categorie={id}/ville={id1}/sous-categorie={id2}', 'BwsController@emploiVilleSousCategoSearch');

Route::get('/sousCategorie', 'BwsController@shopSearchDetails');


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
Route::get('/getannoncehome', 'BwsController@getAnnonceHome');
Route::get('/estconnecter', 'BwsController@Estconnecter');
Route::get('/getcategoriehome', 'BwsController@getCategorieHome');
Route::get('/getfavoris', 'BwsController@getFavoris');
Route::delete('/deleteproduitpanier/{id1}/{id2}/{id3}/{id4}/{id5}', 'BwsController@deleteProduitPanier');
Route::post('/updateproduitpanier', 'BwsController@updateProduitPanier');
Route::get('/getproduitpaniershop', 'BwsController@getProduitPanierShop');
Route::get('/getimageD/{id}', 'BwsController@getImageD');

/************************************************ Admin***********************************************/
Route::post('/appectPublication', 'AdminController@appectPublication');
Route::post('/appectAnnonce', 'AdminController@appectAnnonce');
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
Route::get('/statistiquesAdmin', 'AdminController@statistiques_admin')->name('statistiquesAdmin');
Route::get('/vendeur', 'AdminController@vendeur_admin')->name('vendeur');
Route::post('/updateProfil','AdminController@update_profil');
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

Route::post('/verifierInputsAnnonce','EmployeurController@verifierInputsAnnonce');
Route::get('/profilEmployeur', 'EmployeurController@profil_employeur')->name('profilEmployeur');
Route::get('/annoncesemploi', 'EmployeurController@annonce_emploi')->name('annoncesemploi');
Route::post('/updateProfilE','EmployeurController@update_profil');
Route::post('/addannonce', 'EmployeurController@addAnnonce');
Route::post('/addannoncepaiment', 'EmployeurController@addannoncepaiment');
Route::post('/addpaiment', 'EmployeurController@addpaiment');
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
Route::delete('/deletecommandetraiteremplyeur/{id}','EmployeurDemandeController@deleteDemandeReçuEmployeur');
Route::put('/recudemande/{id}','EmployeurController@RecuDemande');
/*Demande Reçu*/
Route::get('/demandeEmploiRecu','EmployeurDemandeController@get_demande_reçu_emplyeur')->name('demandeEmploiRecu');
Route::post('/detaillsdemandereçuemplyeur', 'EmployeurDemandeController@detaillsdemandeReçuEmplyeur'); 
Route::delete('/deletedemandereçuemplyeur/{id}','EmployeurDemandeController@deleteDemandeReçuEmployeur');
/************************************************ Vendeur***********************************************/
Route::post('/addpaimentv', 'VendeurController@addpaiment');
Route::get('/statistiques', 'VendeurController@getstatistique')->name('statistiquesVendeur');
Route::get('/profilVendeur', 'VendeurController@profil_vendeur')->name('profilVendeur');
Route::post('/updateProfilV','VendeurController@update_profil');
Route::get('/produitVendeur', 'VendeurController@getProduit')->name('produitVendeur');
Route::post('/addproduit', 'VendeurController@addProduit');
Route::post('/addproduitwithtest', 'VendeurController@addProduitWithTest');
Route::post('/addProduitwithPaiment', 'VendeurController@addProduitwithPaiment');
Route::get('/getAllsouscategories/{id}','VendeurController@getSousCategories');
Route::get('/getAllcategoriess', 'VendeurController@getCategories');
Route::get('/getAllcolor', 'VendeurController@getColors');
/*commande reçu vendeur*/
Route::get('/commandeRecuVendeur','VendeurController@get_commande_vendeur')->name('commandeRecuVendeur');
Route::post('/detaillsacommandevendeur', 'VendeurController@detaillsacommandeVendeur'); 
Route::delete('/deletecommandevendeur/{idCmd}/{idClient}/{idVendeur}','VendeurController@deleteCommandeVendeur');
Route::put('/recucommande/{id}/{id1}','VendeurController@RecuCommande');
Route::put('/refusercommande/{id}/{id1}/{id2}','VendeurController@RefuserCommande');
Route::post('/addvilles','VendeurController@AjouterVillePrix');
Route::delete('/deleteproduit/{id}','VendeurController@deleteProduit');
Route::put('/updateproduit','VendeurController@updateProduit');
Route::post('/verifierInputs','VendeurController@verifierInputs');
Route::get('/gettypelvendeur','VendeurController@getTypeLVendeur');
Route::get('/getpaimentvendeurr','VendeurController@getPaimentVendeurr');
Route::get('/getdetailsproduitvendeur/{id}','VendeurController@getDetailsProduitVendeur');
Route::get('/tarifville','VendeurController@tarifVille');
Route::delete('/deleteTypeLivr/{id}','VendeurController@deleteTypeLivr');
Route::post('/addTypeLivr','VendeurController@addTypeLivr');
/*commande traiter vendeur*/
Route::get('/commandeTraiterVendeur','VendeurCommandeController@get_commande_traiter_vendeur')->name('commandeTraiterVendeur');
Route::post('/detaillsacommandetraitervendeur', 'VendeurCommandeController@detaillsacommandeTraiterVendeur'); 
Route::delete('/deletecommandetraitervendeur/{id}','VendeurCommandeController@deleteCommandeTraiterVendeur');

/************************************************ Client***********************************************/
Route::get('/profilClient','ClientController@profil_clinet')->name('profilClient');
Route::post('/updateProfilC','ClientController@update_profil');
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
Route::post('/getTarifCommande', 'ClientController@getTarifCommande');
Route::post('/checktextarea', 'ClientController@checkTextarea'); 

/*historique*/
Route::get('/historiqueClient','HistoriqurController@get_historique_client')->name('historiqueClient');
Route::delete('/deletehistorique/{id}','HistoriqurController@deleteHistorique');
Route::post('/ajouterHistoProduit/{id}','ClientController@addHisto');

/*Notification*/
Route::get('/notificationClient','NotificationController@get_notification_client')->name('notificationClient');
Route::delete('/deletenotificationclient/{id}','NotificationController@deleteNotificationClient');

/*Favoris*/
Route::post('/ajoutaufavoris/{id}','ClientController@AjoutAuFavoris');
Route::post('/ajoutaufavorisE/{id}','ClientController@AjoutAuFavorisE');
Route::delete('/deletefavorisclient/{id}','FavorisController@deletefavorisClient');
Route::get('/favorisClient', 'ClientController@getProduit')->name('favorisClient');
Route::post('/annonceaufavoris/{id}','ClientController@AnnonceAuFavoris');

//EnvoyerCommande
Route::post('/envoyercommande', 'ClientController@EnvoyerCommande');
Route::post('/envoyerdemande', 'ClientController@EnvoyerDemande');
Route::get('/iscnnected', 'ClientController@isCnnected');

/****************Vendeur******Client*******Admin******Employeur*******Visiteur**********/
//Search
Route::get('/articleSe', 'BwsController@getArticleSearch');
Route::get('/categorieShopS', 'AdminController@getCategorieShopSearch');
Route::get('/categorieEmploiS', 'AdminController@getCategorieEmploiSearch');
Route::get('/notificationS', 'AdminController@getNotificationSearch');
Route::get('/categorieS', 'AdminController@getCategorieSearch');
Route::get('/emailsS', 'AdminController@getEmailsSearch');
Route::get('/articleS', 'AdminController@getArticleSearch');
//Route::get('/abest', 'BwsController@getsearch')->name('abest');
Route::get('/produit_Aemploi_article', 'BwsController@getsearchVisiteur')->name('abestv');
Route::get('/abestav', 'AdminController@getsearchav')->name('abestav');
Route::get('/abestae', 'AdminController@getsearchae')->name('abestae');
Route::get('/abestac', 'AdminController@getsearchac')->name('abestac');
Route::get('/abestaa', 'AdminController@getsearchaa')->name('abestaa');
Route::get('/abestaaR', 'AdminController@getsearchaaRecup');
Route::get('/abestavR', 'AdminController@getsearchavRecup');
Route::get('/abestacR', 'AdminController@getsearchacRecup');
Route::get('/abestaeR', 'AdminController@getsearchaeRecup');

/***Signaler***/
Route::post('/signalerproduit/{id}','ClientController@SignalerProduit');
Route::post('/signalerannonce/{id}','ClientController@SignalerAnnonce');
Route::post('/signalervendeur/{id}','ClientController@SignalerVendeur');
Route::post('/signaleremployeur/{id}','ClientController@SignalerEmployeur');

Route::post('/paiementemployeur/{id}','EmployeurController@change_valeur');
Route::post('/paimentemp','EmployeurController@validateForm');
Route::post('/paiementvend','VendeurController@validateFormProduit');

Route::post('/verifierproduit/{id}','AdminController@Verifier');
Route::post('/verifierannonce/{id}','AdminController@VerifierAnnonce');

Route::post('/changepassword','ClientController@changePassword');


 /**/