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
use App\Article;

class BwsController extends Controller
{
   
/************************************************ Visiteur***********************************************/  
    public function getFavoris(){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $client = $client = Client::find(Auth::user()->id);
           
            return ['etat' => true ];
        }
        return ['etat' => false];
    } 

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
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        return view('apropos',['categorie'=>$categorie,'categorieE'=>$categorieE]);
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
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $client = $client = Client::find(Auth::user()->id);
           $fav = \DB::table('favoris')->where('client_id',$client->id)->get();
            return view('shop',['produit'=>$produit, 'ImageP' => $imageproduit, 'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille ,'categorie'=>$categorie,'categorieE'=>$categorieE,'fav' => $fav]);
        }
            $fav=array(); 
        return view('shop',['produit'=>$produit, 'ImageP' => $imageproduit, 'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille ,'categorie'=>$categorie,'categorieE'=>$categorieE,'fav' => $fav]);
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
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();  
        return ['categorie'=>$categorie , 'sousCatego'=> $sousCatego,'categorieE'=>$categorieE];
       
        
    }

     public function emploi()
    {
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        return view('emploi',['categorie'=>$categorie ,'categorieE'=>$categorieE]);
    }

     public function article()
    {
       $allArticle = \DB::table('articles')
        ->join('admins', 'admins.id', '=', 'articles.admin_id')
        ->select('admins.nom','admins.prenom','articles.*',\DB::raw('DATE(articles.created_at) as date'))
        ->orderBy('articles.created_at','desc')
        ->paginate(3) ;
       $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        return view('article',['allArticle' =>$allArticle,'categorie'=>$categorie ,'categorieE'=>$categorieE]);
    }
    public function contact()
    {
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        return view('contact',['categorie'=>$categorie ,'categorieE'=>$categorieE]);
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
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        return view('home',['categorie'=>$categorie ,'categorieE'=>$categorieE]);
    }

     public function home()
    {
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        return view('home',['categorie'=>$categorie ,'categorieE'=>$categorieE]);
    }

    public function showArticleD($id)
    {
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $article = \DB::table('articles')->where('articles.id',$id)
        ->join('admins','admins.id', '=', 'articles.admin_id')
        ->select('admins.Nom', 'admins.Prenom', 'articles.*',\DB::raw('DATE(articles.created_at) as date'))
        ->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        return view('article_detaille',['categorie' => $categorie, 'article' => $article,'categorieE'=>$categorieE]);
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

   

    public function statistiques_admin(){
      
        return view('statistiques_admin');
    }

    public function vendeur_admin(){
      
        return view('vendeur_admin');
    }

/************************************************ Vendeur***********************************************/

    public function statistiques_vendeur(){
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        return view('statistiques_vendeur',['categorie'=>$categorie ,'categorieE'=>$categorieE]);
    }


/******Client***************Admin*************** Vendeur************Employeur***********************Visiteur************/


    
    public function getsearch(Request $request)
    {
        $search = $request->get('search');
        $produit  =\DB::table('produits')->where('Libellé', 'like', '%'.$search.'%')
                                         ->orWhere('description', 'like', '%'.$search.'%')
                                         ->paginate(5);
        $imagesproduit = \DB::table('imageproduits')->get();



        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();

        $article  =\DB::table('articles')->where('titre', 'like', '%'.$search.'%')
        ->orWhere('description', 'like', '%'.$search.'%')
        ->paginate(5);

        $annonce  =\DB::table('annonce_emploies')->where('libellé', 'like', '%'.$search.'%')
        ->orWhere('discription', 'like', '%'.$search.'%')
        ->paginate(5);
        
if(User::find(Auth::user()->id)->type_compte === 'c') {
        return view('searchclient',['produit'=>$produit, 'ImageP' => $imagesproduit,'annonce'=>$annonce,'article'=>$article, 'search' => $search,'categorie'=>$categorie,'categorieE'=>$categorieE]);

}
elseif(User::find(Auth::user()->id)->type_compte === 'v') {
    return view('searchvendeur',['produit'=>$produit, 'ImageP' => $imagesproduit,'annonce'=>$annonce,'article'=>$article, 'search' => $search,'categorie'=>$categorie,'categorieE'=>$categorieE]);

}
elseif(User::find(Auth::user()->id)->type_compte === 'e') {
    return view('searchemployeur',['produit'=>$produit, 'ImageP' => $imagesproduit,'annonce'=>$annonce,'article'=>$article, 'search' => $search,'categorie'=>$categorie,'categorieE'=>$categorieE]);

}
elseif(User::find(Auth::user()->id)->type_compte === 'a') {
    return view('searchadmin',['produit'=>$produit, 'ImageP' => $imagesproduit,'annonce'=>$annonce,'article'=>$article, 'search' => $search,'categorie'=>$categorie,'categorieE'=>$categorieE]);

}

    }
   
    /*****************************VisiteurSearch***********************/

    public function getsearchVisiteur(Request $request)
    {
        $search = $request->get('search');
        $produit  =\DB::table('produits')->where('Libellé', 'like', '%'.$search.'%')
                                         ->orWhere('description', 'like', '%'.$search.'%')
                                         ->paginate(5);
        $imagesproduit = \DB::table('imageproduits')->get();



        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();

        $article  =\DB::table('articles')->where('titre', 'like', '%'.$search.'%')
        ->orWhere('description', 'like', '%'.$search.'%')
        ->paginate(5);

        $annonce  =\DB::table('annonce_emploies')->where('libellé', 'like', '%'.$search.'%')
        ->orWhere('discription', 'like', '%'.$search.'%')
        ->paginate(5);


    return view('searchvisiteur',['produit'=>$produit,'ImageP' => $imagesproduit,'annonce'=>$annonce,'article'=>$article, 'search' => $search,'categorie'=>$categorie,'categorieE'=>$categorieE]);



    }
    
}
