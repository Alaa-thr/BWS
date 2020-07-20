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
use DB;
use Illuminate\Support\Facades\Validator;
use App\Rules\ModifieTextDescriptionArticle;
use App\Favori;
use App\Signal;
use App\Notification;
use App\Historique;
use App\Produit;
use App\Demande_emploie;
use App\Annonce_emploie;
use App\Imageproduit;
use App\ColorProduit;
use App\TailleProduit;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CommandeRequest;
use App\Rules\Taille; 
use Session;
use Hash;

class BwsController extends Controller
{
   
/************************************************ ***********************************************/ 
public function shopSearchDetails(Request $request){


    $produit = \DB::table('produits')->get();       
        

    if($request->has('sousCategorie')){
         $produit->where(function ($q) use ($request)
            {
                return $q->where('sous_categorie_id',  $request->input('sousCategorie'));
            });
    }
         
       /* $color = \DB::table('colors')->join('color_produits', 'colors.id', '=', 'color_produits.color_id')->get();
        $taille = \DB::table('taille_produits')->get();
        $typeLivraison = \DB::table('typechoisirvendeurs')->get();
       
        
        $sousC = \DB::table('sous_categories')->where([['categorie_id',0]])->get();    
        
        $query = User::where('company_id', $request->input('company_id'));

        if ($request->has('last_name'))
        {
            $query->where('last_name', 'LIKE', '%' . $request->input('last_name') . '%');
        }*/
        

    }













public function emploiVilleSousCategoSearch($id,$idVille,$idSC){
        $emploi = \DB::table('annonce_emploies')
            ->join('employeurs','employeurs.id','=','employeur_id')
            ->select('annonce_emploies.*')
            ->where([['sous_categorie_id',$idSC],['employeurs.ville',$idVille]])
            ->orderBy('annonce_emploies.created_at','desc')->paginate(21) ;
        $idd = \DB::table('sous_categories')->where('id',$idSC)->select('libelle')->get();
        $idville = \DB::table('villes')->where('nom',$idVille)->select('nom')->get();
        $ville = \DB::table("villes")->orderBy("nom")->get();
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $c = Client::find(Auth::user()->id);
            $favoris = \DB::table('produits')->get();
            $imageproduit = \DB::table('imageproduits')->get();
            $command = \DB::table('commandes')->where([['commande_envoyee',0]])->get();     
            $sousC = \DB::table('sous_categories')->where([['categorie_id',$id]])->get();
            
            $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
            $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
            $fav = \DB::table('favoris')->where('client_id',$c->id)->get();
             $c->nom= ucwords($c->nom);
             $c->prenom= ucwords($c->prenom);
            return view('emploiCategorie',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav,'sousC' => $sousC,'id'=>$idd,'idville'=>$idville,'ville'=>$ville]);
        }
        $c['nom'] = "";
        $c['prenom'] = "";
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = array();     
        $fav = array();
        $sousC = \DB::table('sous_categories')->where([['categorie_id',$id]])->get();
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }
        return view('emploiCategorie',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE        ,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav,'sousC' => $sousC,'id'=>$idd,'idville'=>$idville,'ville'=>$ville]);
    }


    public function emploiSousCategoVilleSearch($id,$idSC,$idVille){
        $emploi = \DB::table('annonce_emploies')
            ->join('employeurs','employeurs.id','=','employeur_id')
            ->select('annonce_emploies.*')
            ->where([['sous_categorie_id',$idSC],['employeurs.ville',$idVille]])
            ->orderBy('annonce_emploies.created_at','desc')->paginate(21) ;
        $idd = \DB::table('sous_categories')->where('id',$idSC)->select('libelle')->get();
        $idville = \DB::table('villes')->where('nom',$idVille)->select('nom')->get();
        $ville = \DB::table("villes")->orderBy("nom")->get();
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $c = Client::find(Auth::user()->id);
            $favoris = \DB::table('produits')->get();
            $imageproduit = \DB::table('imageproduits')->get();
            $command = \DB::table('commandes')->where([['commande_envoyee',0]])->get();     
            $sousC = \DB::table('sous_categories')->where([['categorie_id',$id]])->get();
            
            $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
            $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
            $fav = \DB::table('favoris')->where('client_id',$c->id)->get();
             $c->nom= ucwords($c->nom);
             $c->prenom= ucwords($c->prenom);
            return view('emploiCategorie',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav,'sousC' => $sousC,'id'=>$idd,'idville'=>$idville,'ville'=>$ville]);
        }
        $c['nom'] = "";
        $c['prenom'] = "";
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = array();     
        $fav = array();
        $sousC = \DB::table('sous_categories')->where([['categorie_id',$id]])->get();
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }
        return view('emploiCategorie',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE        ,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav,'sousC' => $sousC,'id'=>$idd,'idville'=>$idville,'ville'=>$ville]);
    }



    public function emploiVilleSearch($id,$idVille){
        $emploi = \DB::table('annonce_emploies')
            ->join('sous_categories','sous_categories.id','=','annonce_emploies.sous_categorie_id')
            ->join('employeurs','employeurs.id','=','employeur_id')
            ->select('annonce_emploies.*')
            ->where([['sous_categories.categorie_id',$id],['employeurs.ville',$idVille]])
            ->orderBy('annonce_emploies.created_at','desc')->paginate(21) ;
        $idd = 0;
        $idville = \DB::table('villes')->where('nom',$idVille)->select('nom')->get();
        $ville = \DB::table("villes")->orderBy("nom")->get();
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $c = Client::find(Auth::user()->id);
            $favoris = \DB::table('produits')->get();
            $imageproduit = \DB::table('imageproduits')->get();
            $command = \DB::table('commandes')->where([['commande_envoyee',0]])->get();     
            $sousC = \DB::table('sous_categories')->where([['categorie_id',$id]])->get();
            
            $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
            $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
            $fav = \DB::table('favoris')->where('client_id',$c->id)->get();
             $c->nom= ucwords($c->nom);
             $c->prenom= ucwords($c->prenom);
            return view('emploiCategorie',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav,'sousC' => $sousC,'id'=>$idd,'idville'=>$idville,'ville'=>$ville]);
        }
        $c['nom'] = "";
        $c['prenom'] = "";
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = array();     
        $fav = array();
        $sousC = \DB::table('sous_categories')->where([['categorie_id',$id]])->get();
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }
        return view('emploiCategorie',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE        ,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav,'sousC' => $sousC,'id'=>$idd,'idville'=>$idville,'ville'=>$ville]);
    }





 public function emploiSousCategorieSearch($id,$id1){
        $ville = \DB::table("villes")->orderBy("nom")->get();
        $emploi = \DB::table('annonce_emploies')
            ->where('sous_categorie_id',$id1)
            ->orderBy('created_at','desc')->paginate(21) ;
        $idd = \DB::table('sous_categories')->where('id',$id1)->select('libelle')->get();
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $c = Client::find(Auth::user()->id);
            $favoris = \DB::table('produits')->get();
            $imageproduit = \DB::table('imageproduits')->get();
            $command = \DB::table('commandes')->where([['commande_envoyee',0]])->get();     
            $sousC = \DB::table('sous_categories')->where([['categorie_id',$id]])->get();
            
            $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
            $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
            $fav = \DB::table('favoris')->where('client_id',$c->id)->get();
             $c->nom= ucwords($c->nom);
             $c->prenom= ucwords($c->prenom);
            return view('emploiCategorie',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav,'sousC' => $sousC,'id'=>$idd,'ville'=>$ville, 'idville'=>0]);
        }
        $c['nom'] = "";
        $c['prenom'] = "";
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = array();     
        $fav = array();
        $sousC = \DB::table('sous_categories')->where([['categorie_id',$id]])->get();
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }
        return view('emploiCategorie',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE        ,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav,'sousC' => $sousC,'id'=>$idd,'ville'=>$ville, 'idville'=>0]);
    }


    public function shopSearch($id){
         $produit = \DB::table('produits')
         ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
         ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
         ->where('sous_categories.categorie_id',$id)
         ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*')
         ->get();       
        $imageproduit = \DB::table('imageproduits')->get();
        $color = \DB::table('colors')->join('color_produits', 'colors.id', '=', 'color_produits.color_id')->get();
        $taille = \DB::table('taille_produits')->get();
        $typeLivraison = \DB::table('typechoisirvendeurs')->get();
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        
        $favori = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $sousC = \DB::table('sous_categories')->where([['categorie_id',$id]])->get();    
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $client =  Client::find(Auth::user()->id);
            $command = \DB::table('commandes')->where([ ['client_id',$client->id],['id',$client->nbr_cmd]])->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$client->id],['id',$client->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
           $fav = \DB::table('favoris')->where('client_id',$client->id)->get();
            return view('shopCategorie',['produit'=>$produit, 'ImageP' => $imageproduit, 'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille ,'categorie'=>$categorie,'categorieE'=>$categorieE,'fav' => $fav,'command' => $command,'Fav' => $favori,'prixTotale' => $prixTotale,'sousC' => $sousC]);
        }
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }

        $fav=array(); 
        $command = array();
        return view('shopCategorie',['produit'=>$produit, 'ImageP' => $imageproduit, 'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille ,'categorie'=>$categorie,'categorieE'=>$categorieE,'fav' => $fav,'command' => $command,'Fav' => $favori,'prixTotale' => $prixTotale,'sousC' => $sousC]);

    }

    public function emploiSearch($id){
        $ville = \DB::table("villes")->orderBy("nom")->get();
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $c = Client::find(Auth::user()->id);
            $favoris = \DB::table('produits')->get();
            $imageproduit = \DB::table('imageproduits')->get();
            $command = \DB::table('commandes')->where([['commande_envoyee',0]])->get();     
            $sousC = \DB::table('sous_categories')->where([['categorie_id',$id]])->get();
            $emploi = \DB::table('annonce_emploies')
            ->join('sous_categories','sous_categories.id','annonce_emploies.sous_categorie_id')
            ->where('categorie_id',$id)
            ->orderBy('annonce_emploies.created_at','desc')->paginate(21) ;
            $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
            $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
            $fav = \DB::table('favoris')->where('client_id',$c->id)->get();
             $c->nom= ucwords($c->nom);
             $c->prenom= ucwords($c->prenom);
            return view('emploiCategorie',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav,'sousC' => $sousC,'id'=>0, 'ville'=> $ville, 'idville'=> 0]);
        }
        $c['nom'] = "";
        $c['prenom'] = "";
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = array();     
        $fav = array();
        $sousC = \DB::table('sous_categories')->where([['categorie_id',$id]])->get();
        $emploi = \DB::table('annonce_emploies')
            ->join('sous_categories','sous_categories.id','annonce_emploies.sous_categorie_id')
            ->where('categorie_id',$id)
            ->orderBy('annonce_emploies.created_at','desc')->paginate(21) ;
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }
        return view('emploiCategorie',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE        ,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav,'sousC' => $sousC,'id'=>0, 'ville'=> $ville, 'idville'=> 0]);
    }

    public function getAnnonceHome(){
        $favori = \DB::table('annonce_emploies')->get();
         $annonce = \DB::table('annonce_emploies')
         ->join('employeurs','employeurs.id', '=', 'annonce_emploies.employeur_id')
         ->select('employeurs.Nom', 'employeurs.Prenom', 'annonce_emploies.*')
         ->take(24)->get(); 
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $client = $client = Client::find(Auth::user()->id);
            $client->nom= ucwords($client->nom);
             $client->prenom= ucwords($client->prenom);
            return ['annonce'=>$annonce,'client' => $client];
        }
        $client['nom'] = "";
        $client['prenom'] = "";  
        return ['annonce'=>$annonce,'client' => $client];
    }

    public function getFavoris(){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $client = $client = Client::find(Auth::user()->id);
           
            return ['etat' => true ];
        }
        return ['etat' => false];
    } 

    public function getProduitPanierShop(){
        $favori = \DB::table('produits')->get();
        return ['Fav' => $favori];
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
         if(auth()->check() && Auth::user()->type_compte == 'c'){
            $c = Client::find(Auth::user()->id);
            $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
            $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
            $favoris = \DB::table('produits')->get();
            $imageproduit = \DB::table('imageproduits')->get();
            $command = \DB::table('commandes')->where([ ['client_id',$c->id],['commande_envoyee',0]])->get(); 
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }    
            return view('apropos',['categorie'=>$categorie,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale]);

         }
        $c = array();
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = array(); 
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }    
        return view('apropos',['categorie'=>$categorie,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale]);
    }

    public function produitVisiteur()
    {
        $produit = \DB::table('produits')
         ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
         ->join('paiement_vendeurs','paiement_vendeurs.vendeur_id', '=', 'produits.vendeur_id')->where('response',1)
         ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*')
         ->orderBy('position','asc')
         ->get();   

        $imageproduit = \DB::table('imageproduits')->get();
        $color = \DB::table('colors')->join('color_produits', 'colors.id', '=', 'color_produits.color_id')->get();
        $taille = \DB::table('taille_produits')->get();
        $typeLivraison = \DB::table('typechoisirvendeurs')->get();
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        
        $favori = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
            
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $client =  Client::find(Auth::user()->id);
            $command = \DB::table('commandes')->where([ ['client_id',$client->id],['id',$client->nbr_cmd]])->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$client->id],['id',$client->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
           $fav = \DB::table('favoris')->where('client_id',$client->id)->get();
            return view('shop',['produit'=>$produit, 'ImageP' => $imageproduit, 'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille ,'categorie'=>$categorie,'categorieE'=>$categorieE,'fav' => $fav,'command' => $command,'Fav' => $favori,'prixTotale' => $prixTotale]);
        }
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }
        $fav=array(); 
        $command = array();
        return view('shop',['produit'=>$produit, 'ImageP' => $imageproduit, 'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille ,'categorie'=>$categorie,'categorieE'=>$categorieE,'fav' => $fav,'command' => $command,'Fav' => $favori,'prixTotale' => $prixTotale]);
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

    public function getImageD($id){
            $image = \DB::table('imageproduits')->where('imageproduits.produit_id',$id)->get();
            return ['imagee'=>$image];
    }

    public function getProduitHome(){
        $favori = \DB::table('produits')->get();
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $client =  Client::find(Auth::user()->id);
            $command = \DB::table('commandes')->where([ ['client_id',$client->id],['id',$client->nbr_cmd]])->get();
            $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('imageproduits','imageproduits.produit_id', '=', 'produits.id')
             ->where('imageproduits.profile',1)
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','imageproduits.image')
             ->take(24)->get();       
            $imageproduit = \DB::table('imageproduits')->get();
            $color = \DB::table('colors')->join('color_produits', 'colors.id', '=', 'color_produits.color_id')->get();
            $taille = \DB::table('taille_produits')->get();
            $typeLivraison = \DB::table('typechoisirvendeurs')->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$client->id],['id',$client->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
          
            return ['produit'=>$produit, 'ImageP' => $imageproduit, 'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille ,'command' => $command,'Fav' => $favori,'prixTotale' => $prixTotale];
        }
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }
        $fav=array(); 
        $command = array();
         $produit = \DB::table('produits')
         ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
         ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*')
         ->take(24)->get();       
        $imageproduit = \DB::table('imageproduits')->get();
        $color = \DB::table('colors')->join('color_produits', 'colors.id', '=', 'color_produits.color_id')->get();
        $taille = \DB::table('taille_produits')->get();
        $typeLivraison = \DB::table('typechoisirvendeurs')->get();
        return ['produit'=>$produit, 'ImageP' => $imageproduit, 'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille,'command' => $command,'Fav' => $favori,'prixTotale' => $prixTotale ];
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
        $annonce = \DB::table('annonce_emploies')->get();
        $produi = \DB::table('produits')->get();

        $autresscat = \DB::table('sous_categories')->where('categorie_id',null)->get();
        $autre = 2;
        $another = 2;
        if(count($autresscat) != 0 ){
            foreach ($autresscat as $sC) {
                foreach ($annonce as $ann) {

                if($sC->id == $ann->sous_categorie_id){
                                      
                            $autre = 0;
                          }
                        
                    
                    }}
                
            foreach ($autresscat as $sC) {
                foreach ($produi as $pro) {
        
                        if($sC->id == $pro->sous_categorie_id){
                                     
                            $another = 0;
                                 
                                }
                                
                            
                            }}
                            return ['categorie'=>$categorie , 'sousCatego'=> $sousCatego,'categorieE'=>$categorieE,'autre'=>$autre,'another'=>$another];
                }
        else{
       return ['categorie'=>$categorie , 'sousCatego'=> $sousCatego,'categorieE'=>$categorieE];
       
        }
    }

     public function emploi()
    {
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $c = Client::find(Auth::user()->id);
            $favoris = \DB::table('produits')->get();
            $imageproduit = \DB::table('imageproduits')->get();
            $command = \DB::table('commandes')->where([['commande_envoyee',0]])->get();     

            $emploi = \DB::table('annonce_emploies')->orderBy('created_at','desc')->paginate(21) ;
            $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
            $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
            $fav = \DB::table('favoris')->where('client_id',$c->id)->get();
             $c->nom= ucwords($c->nom);
             $c->prenom= ucwords($c->prenom);
            return view('emploi',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav]);
        }
        $c['nom'] = "";
        $c['prenom'] = "";
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = array();     
        $fav = array();
        $emploi = \DB::table('annonce_emploies')->orderBy('created_at','desc')->paginate(21) ;
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }
        return view('emploi',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE        ,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav]); 
    }
    
    public function detailsEmploi(Request $request){
        $det_emp = \DB::table('employeurs')->join('annonce_emploies','employeurs.id','=','annonce_emploies.employeur_id')->where('annonce_emploies.id', $request->idEMP)->get();
        $det_emp[0]->nom =  ucwords($det_emp[0]->nom);
        $det_emp[0]->prenom =  ucwords($det_emp[0]->prenom);
        return  $det_emp;
    }

     public function article()
    {
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $c = Client::find(Auth::user()->id);
            $favoris = \DB::table('produits')->get();
            $imageproduit = \DB::table('imageproduits')->get();
            $command = \DB::table('commandes')->where([ ['client_id',$c->id],['commande_envoyee',0]])->get();     

           $allArticle = \DB::table('articles')
            ->join('admins', 'admins.id', '=', 'articles.admin_id')
            ->select('admins.nom','admins.prenom','articles.*',\DB::raw('DATE(articles.created_at) as date'))
            ->orderBy('articles.created_at','desc')
            ->paginate(3) ;
           $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
            $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
            return view('article',['allArticle' =>$allArticle,'categorie'=>$categorie ,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale]);
        }
        $c = array();
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = array();     

       $allArticle = \DB::table('articles')
        ->join('admins', 'admins.id', '=', 'articles.admin_id')
        ->select('admins.nom','admins.prenom','articles.*',\DB::raw('DATE(articles.created_at) as date'))
        ->orderBy('articles.created_at','desc')
        ->paginate(3) ;
       $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }
        return view('article',['allArticle' =>$allArticle,'categorie'=>$categorie ,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale]);
    }
    public function contact()
    {         
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $c = Client::find(Auth::user()->id);
            $favoris = \DB::table('produits')->get();
            $imageproduit = \DB::table('imageproduits')->get();
            $command = \DB::table('commandes')->where([ ['client_id',$c->id],['commande_envoyee',0]])->get();     
            $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
            $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
            return view('contact',['categorie'=>$categorie ,'categorieE'=>$categorieE ,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale]);
        }
        $c = array();
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = array();     
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }
        return view('contact',['categorie'=>$categorie ,'categorieE'=>$categorieE ,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale]);
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
        $image=array();
        $imageP=\DB::table('imageproduits')->get();
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        return view('home',['imageP'=>$imageP,'image'=>$image,'categorie'=>$categorie ,'categorieE'=>$categorieE]);
    }

     public function home()
    {
        $image=array();
        $imageP=\DB::table('imageproduits')->get();
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        return view('home',['imageP'=>$imageP,'image'=>$image,'categorie'=>$categorie ,'categorieE'=>$categorieE]);
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

    public function deleteProduitPanier($id1 ,$id2 ,$id3 ,$id4 ,$id5){
        $client = Client::find(Auth::user()->id);
        \DB::table('commandes')->where([['produit_id',$id1],['qte',$id2],['taille',$id3],['type_livraison',$id4],['couleur_id',$id5],['client_id',$client->id],['id',$client->nbr_cmd]])->delete();
       
        return Response()->json(['etat' => true]);
    }

    public function updateProduitPanier(Request $request){
       
        $client = Client::find(Auth::user()->id);
        if($request->type == 'color'){
            \DB::table('commandes')->where([['produit_id',$request->produit_id],['client_id',$client->id],['id',$client->nbr_cmd]])->
            update(['couleur_id'=> $request->val]);
        }
        else if($request->type == 'taille'){
            \DB::table('commandes')->where([['produit_id',$request->produit_id],['client_id',$client->id],['id',$client->nbr_cmd]])->
            update(['taille'=> $request->val]);
        }
        else if($request->type == 'typeL'){
            \DB::table('commandes')->where([['produit_id',$request->produit_id],['client_id',$client->id],['id',$client->nbr_cmd]])->
            update(['type_livraison'=> $request->val]);
        }
        else if($request->type == 'qte'){
            \DB::table('commandes')->where([['produit_id',$request->produit_id],['client_id',$client->id],['id',$client->nbr_cmd]])->
            update(['qte'=> $request->val]);
        }
        return Response()->json(['etat' => true]);
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
        $NombreInscriptionParMois = \DB::table("users")->where('type_compte','<>','a')->select(\DB::raw('count(id) as `Nombre_Iscription_Par_Mois`'),\DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
           ->groupby('month','year')
           ->having('year','=',date("Y"))
           ->get();
        $categoriesPlusDemanderShop = \DB::table("produits")
            ->join('sous_categories','sous_categories.id','=','produits.sous_categorie_id')
            ->join('categories','categories.id','=','sous_categories.categorie_id')
            ->where('categories.typeCategorie','shop')
            ->select(\DB::raw('count(produits.id) as `Catego_shop`'),'categories.libelle')
           ->groupby('categories.libelle')
           ->orderBy('categories.libelle','asc')
           ->get();
        $categoriesPlusDemanderEmploi = \DB::table("annonce_emploies")
            ->join('sous_categories','sous_categories.id','=','annonce_emploies.sous_categorie_id')
            ->join('categories','categories.id','=','sous_categories.categorie_id')
            ->where('categories.typeCategorie','emploi')
            ->select(\DB::raw('count(annonce_emploies.id) as `Catego_shop`'),'categories.libelle')
           ->groupby('categories.libelle')
           ->orderBy('categories.libelle','asc')
           ->get();
        $postulationProduit = \DB::table("produits")
            ->select(\DB::raw('count(id) as `postulation_produit`'),\DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
           ->groupby('month','year')
           ->having('year','=',date("Y"))
           ->get();
        $postulationAnnonce = \DB::table("annonce_emploies")
            ->select(\DB::raw('count(id) as `postulation_annonce`'),\DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
           ->groupby('month','year')
           ->having('year','=',date("Y"))
           ->get();   
        $commande = \DB::table("commandes")
            ->where('commandes.commande_envoyee',1)
            ->select(\DB::raw('count(id) as `commande`'),\DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
           ->groupby('month','year')
           ->having('year','=',date("Y"))
           ->orderBy('month','asc')
           ->get();
        $demande = \DB::table("demande_emploies")
            ->where('demande_emploies.reponse_employeur',1)
            ->select(\DB::raw('count(id) as `demande`'),\DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
           ->groupby('month','year')
           ->having('year','=',date("Y"))
           ->orderBy('month','asc')
           ->get();  
        $client = \DB::table("users")->where('type_compte','c')->select(\DB::raw('count(id) as `Iscription_client`'),\DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
           ->groupby('month','year')
           ->having('year','=',date("Y"))
           ->get();
        $vendeur = \DB::table("users")->where('type_compte','v')->select(\DB::raw('count(id) as `Iscription_vendeur`'),\DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
           ->groupby('month','year')
           ->having('year','=',date("Y"))
           ->get();
        $employeur = \DB::table("users")->where('type_compte','e')->select(\DB::raw('count(id) as `Iscription_employeur`'),\DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
           ->groupby('month','year')
           ->having('year','=',date("Y"))
           ->get();

           $admin=Admin::find(Auth::user()->id); 

        return view('statistiques_admin',["NombreInscriptionParMois"=>$NombreInscriptionParMois,"categoriesPlusDemanderShop"=>$categoriesPlusDemanderShop,"categoriesPlusDemanderEmploi"=>$categoriesPlusDemanderEmploi,"postulationProduit"=>$postulationProduit,"postulationAnnonce"=>$postulationAnnonce,"commande"=>$commande,"demande"=>$demande,"client"=>$client,"vendeur"=>$vendeur,"employeur"=>$employeur, 'admin'=>$admin]);
    }

    public function vendeur_admin(){
      
        return view('vendeur_admin');
    }

/************************************************ Vendeur***********************************************/

    public function getstatistique(){
        $vendeur = Vendeur::find(Auth::user()->id);
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $achatParMois = \DB::table('commandes')->where([['Réponse_vendeur',0],['commande_envoyee',1],['vendeur_id',$vendeur->id]])->select(\DB::raw('count(id) as `nombre_Achat`'),\DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
           ->groupby('month','year')
           ->having('year','=',date("Y"))
           ->get();
        $produitPlusAcheter = \DB::table('commandes')
            ->join("produits",'produits.id','=','commandes.produit_id')
            ->where([['commandes.Réponse_vendeur',0],['commandes.commande_envoyee',1],['commandes.vendeur_id',$vendeur->id]])->select(\DB::raw('count(produit_id) as `produit_Plus_Achater`'),'produits.Libellé','commandes.produit_id',\DB::raw('YEAR(commandes.created_at) year'))
           ->groupby('commandes.produit_id','produits.Libellé','commandes.produit_id','year')
            ->having('year','=',date("Y"))
           ->orderBy('produit_Plus_Achater','asc')
           ->get(); 
        $produits = \DB::table('produits')
            ->join('imageproduits','imageproduits.produit_id','=','produits.id')
            ->where([['vendeur_id',$vendeur->id],['imageproduits.profile',1]])
            ->select('Libellé','prix','Qte_P','image','Qte_P','prix','produits.id')
            ->get(); 
        $villeFaitAchat =\DB::table('commandes')
            ->where([['commandes.Réponse_vendeur',0],['commandes.commande_envoyee',1],['commandes.vendeur_id',$vendeur->id]])->select(\DB::raw('count(ville) as `ville_Fait_Achat`'),'ville')
           ->groupby('ville')
           ->orderBy('ville_Fait_Achat','asc')
           ->get(); 
        $produitsJamaisAchete = \DB::table('produits')
            ->whereNotExists(function ($query) {
                   $query->select('commandes.produit_id')
                         ->from('commandes')
                         ->whereRaw('commandes.produit_id = produits.id');
               })
            ->join('imageproduits','imageproduits.produit_id','=','produits.id')
            ->where([['vendeur_id',$vendeur->id],['imageproduits.profile',1]])
            ->select(\DB::raw('DATE(produits.created_at) date'),'Libellé','produits.id','Qte_P','prix','image')
            ->orderBy('date','asc')
            ->take(5)->get();     
        $clientFidele = \DB::table('clients')
            ->join('commandes','commandes.client_id','=','clients.id')
            ->where([['commandes.vendeur_id',$vendeur->id],['commandes.Réponse_vendeur',0],['commandes.commande_envoyee',1]])
            ->select(\DB::raw('count(clients.id) as `nombre_client`'),'nom','prenom')
            ->groupby('clients.id','nom','prenom')
            ->orderBy('nombre_client','desc')
            ->take(10)->get();  
         $commande = \DB::table("commandes")
            ->where([['commandes.vendeur_id',$vendeur->id],['commandes.commande_envoyee',1]])
            ->select(\DB::raw('count(id) as `commande`'),\DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
           ->groupby('month','year')
           ->having('year','=',date("Y"))
           ->orderBy('month','asc')
           ->get();

        return view('statistiques_vendeur',['categorie'=>$categorie ,'categorieE'=>$categorieE,'achatParMois'=>$achatParMois,'produitPlusAcheter'=>$produitPlusAcheter,'produits'=>$produits,'villeFaitAchat'=>$villeFaitAchat,'produitsJamaisAchete'=>$produitsJamaisAchete,'clientFidele'=>$clientFidele,'commande'=>$commande]);
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

    public function getsearchav(Request $request)
    {
        $search = $request->get('search');
        $vendeur  =\DB::table('vendeurs')->where('Nom', 'like', '%'.$search.'%')
                                        
                                         ->orWhere('Prenom', 'like', '%'.$search.'%')
                                         ->orWhere('numTelephone', 'like', '%'.$search.'%')
                                         ->orWhere('Addresse', 'like', '%'.$search.'%')
                                         ->orWhere('Num_Compte_Banquaire', 'like', '%'.$search.'%')
                                         ->paginate(10);
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();

    return view('vendeur_admin',['vendeur'=>$vendeur,'search' => $search,'categorie'=>$categorie,'categorieE'=>$categorieE]);
  }
  public function getsearchae(Request $request)
    {
        $search = $request->get('search');
        $employeur  =\DB::table('employeurs')->where('nom', 'like', '%'.$search.'%')
                                         ->orWhere('prenom', 'like', '%'.$search.'%')
                                         ->orWhere('num_tel', 'like', '%'.$search.'%')
                                         ->orWhere('address', 'like', '%'.$search.'%')
                                         ->orWhere('num_compte_banquiare', 'like', '%'.$search.'%')
                                         ->paginate(10);
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();

    return view('employeur_admin',['employeur'=>$employeur,'search' => $search,'categorie'=>$categorie,'categorieE'=>$categorieE]);
  }
  public function getsearchac(Request $request)
  {
      $search = $request->get('search');
      $client  =\DB::table('clients')->where('nom', 'like', '%'.$search.'%')
                                       ->orWhere('prenom', 'like', '%'.$search.'%')
                                       ->orWhere('numeroTelephone', 'like', '%'.$search.'%')
                                       ->orWhere('codePostal', 'like', '%'.$search.'%')
                                       ->paginate(10);
      $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
      $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();

  return view('client_admin',['client'=>$client,'search' => $search,'categorie'=>$categorie,'categorieE'=>$categorieE]);
}
public function getsearchaa(Request $request)
{
    $search = $request->get('search');
    $admin  =\DB::table('admins')->where('nom', 'like', '%'.$search.'%')
                                     ->orWhere('prenom', 'like', '%'.$search.'%')
                                     ->orWhere('numTelephone', 'like', '%'.$search.'%')
                                     ->orWhere('numCarteBanquaire', 'like', '%'.$search.'%')
                                     ->orWhere('email', 'like', '%'.$search.'%')
                                     ->paginate(10);
    $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
    $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();

return view('admin_admin',['admin'=>$admin,'search' => $search,'categorie'=>$categorie,'categorieE'=>$categorieE]);
}
   
}
