<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Providers\RouteServiceProvider;
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
use App\Notificatione;
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
use Nexmo;

class BwsController extends Controller
{
    public function __construct()
    {
        $this->middleware('logout.user',['except' => ['redirectTo','sendSms','nexmo']]);
        $this->middleware('confirmation.number');
    }

    public function sendSms()
    {
        $user = Auth::user();
        $user->number_confirm = mt_rand(1000,9999);
        $user->save();
        Nexmo::message()->send([
            'to'   => '213540844782',
            'from' => 'Basmah.ws',
            'text' => 'Basmah.ws code '.Auth::user()->number_confirm.'.'
        ]);
        return true;

    }

    public function redirectTo(Request $request)
    {
        
        $user = Auth::user();
        if($user->number_confirm == $request->number_confirm){
            $user->number_confirm = null;
            $user->save();
            if($user->type_compte == "c"){
                return redirect('/profilClient');
            }
            else if($user->type_compte == "v"){
                   return redirect('/statistiques');
            }
            else if($user->type_compte == "e"){
                  return redirect('/profilEmployeur');
            }
        }
        else{
            $messages = 'Le code est incorrect';
            $user->number_confirm = mt_rand(1000,9999);
            $user->save();
            Nexmo::message()->send([
                'to'   => '213540844782',
                'from' => 'Basmah.ws',
                'text' => 'Basmah.ws code '.Auth::user()->number_confirm.'.'
            ]);
            return redirect('/confirmation')->withErrors(['number_confirm' => $messages]);
        }
        
    }

    public function nexmo()
    {
        if(!Auth::user()){
            return view('page_not_found',['categorie'=>\DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get() ,'categorieE'=>\DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get()]);
        }
        Nexmo::message()->send([
            'to'   => '213540844782',
            'from' => 'Basmah.ws',
            'text' => 'Basmah.ws code '.Auth::user()->number_confirm.'.'
        ]);
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        return view('confirm_number',['categorie'=>$categorie,'categorieE'=>$categorieE]);
    }

    public function shopSearchGlobal($id){    
        \DB::table('paiement_vendeurs')->whereMonth('updated_at', '<', Carbon::now()->format('m') )->delete();
        $priceMin = \DB::table('produits')->select('prix')->min('prix');
        $priceMax = \DB::table('produits')->select('prix')->max('prix'); 
        $ville = \DB::table("villes")->orderBy("nom")->get(); 

        $imageproduit = \DB::table('imageproduits')->get();
        $color = \DB::table('colors')->join('color_produits', 'colors.id', '=', 'color_produits.color_id')->get();
        $AllColors = \DB::table('colors')->get();
        $taille = \DB::table('taille_produits')->get();
        $typeLivraison = \DB::table('typechoisirvendeurs')->get();
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        
        $favori = \DB::table('produits')
        ->join('paiement_vendeurs','paiement_vendeurs.vendeur_id', '=', 'produits.vendeur_id')
            ->where('response',1)
        ->get();
        $imageproduit = \DB::table('imageproduits')->get();
        if($id == 1){
             $sousC = \DB::table('produits')
                ->join("sous_categories",'sous_categories.id','=','produits.sous_categorie_id')->distinct('sous_categories.id')->select('sous_categories.*')->where('sous_categories.categorie_id',1)->get();

        }
        else{
            $sousC = \DB::table('sous_categories')->where([['categorie_id',$id]])->get();
        } 
        
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $client =  Client::find(Auth::user()->id);
            $command = \DB::table('commandes')->where([ ['client_id',$client->id],['id',$client->nbr_cmd]])->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$client->id],['id',$client->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
           $fav = \DB::table('favoris')->where('client_id',$client->id)->get();
            return [ 'ImageP' => $imageproduit, 'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille ,'categorie'=>$categorie,'categorieE'=>$categorieE,'fav' => $fav,'command' => $command,'Fav' => $favori,'prixTotale' => $prixTotale,'sousC' => $sousC,'priceMin' => $priceMin,'priceMax' => $priceMax,'AllColors' => $AllColors,'ville'=> $ville];
        }
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }

        $fav=array(); 
        $command = array();
        return [ 'ImageP' => $imageproduit, 'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille ,'categorie'=>$categorie,'categorieE'=>$categorieE,'fav' => $fav,'command' => $command,'Fav' => $favori,'prixTotale' => $prixTotale,'sousC' => $sousC,'priceMin' => $priceMin,'priceMax' => $priceMax,'AllColors' => $AllColors, 'ville'=> $ville];

    }
    public function selectt($idSousC,$idColor,$idTaille,$Prix,$ville,$typeL){
         $NameSousCategorie = \DB::table('sous_categories')->where('id',$idSousC)->select('libelle')->get();
         $NameColor = \DB::table('colors')->where('nom',$idColor)->select('nom')->get();
         $NameTaille = array(['nom'=>$idTaille]);
         $NamePrix = array(['prix'=>$Prix]);
        
         $NameVille = \DB::table('villes')->where('nom',$ville)->select('nom')->get();
         $NameTypeL = array(['Type_livraison'=>$typeL]);
         return ['NameSousCategorie'=> $NameSousCategorie,'NameColor'=> $NameColor,'NameTaille'=> $NameTaille,'NamePrix'=> $NamePrix,'NameVille'=> $NameVille,'NameTypeL'=> $NameTypeL]; 
    }
/************************************* COULEUR***********************************/
//Couleur
    public function shopSousCategorieColorSearch($idCatego, $idSousC, $idColor){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $client =  Client::find(Auth::user()->id);
             $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->where([['sous_categories.id',$idSousC],['colors.nom',$idColor]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
            ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
        }
        else{
           $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->where([['sous_categories.id',$idSousC],['colors.nom',$idColor]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get(); 
        }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,0,0,0,0)); 
    }

//Couleur*Taille
    public function shopSousCategorieColorTSearch($idCatego, $idSousC, $idColor,$idTaille){
            if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['taille_produits.nom',$idTaille],['colors.nom',$idColor]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                    ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
               $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->where([['sous_categories.id',$idSousC],['taille_produits.nom',$idTaille],['colors.nom',$idColor]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,0,0,0)); 
    }

//Couleur*prix
    public function shopSousCategorieColorPSearch($idCatego, $idSousC, $idColor,$prix){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit =\DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$prix],['colors.nom',$idColor]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                        ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get(); 
            }
            else{
               $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$prix],['colors.nom',$idColor]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,0,$prix,0,0)); 
    }

//Couleur*Taille*prix
    public function shopSousCategorieColorTPrSearch($idCatego, $idSousC, $idColor,$idTaille,$Prix){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
               $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,0,0)); 
    }

//Couleur*prix*Taille
    public function shopSousCategorieColorPTSearch($idCatego, $idSousC, $idColor,$Prix ,$idTaille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
               $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,0,0)); 
    }

//Couleur*Prix*Ville
    public function shopSousCategorieColorPrVSearch($idCatego, $idSousC, $idColor,$Prix ,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['colors.nom',$idColor],['produits.prix',$Prix]])
                  ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
               $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['colors.nom',$idColor],['produits.prix',$Prix]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,0,$Prix ,$idVille,0)); 
    }

//Couleur*Prix*Type_livraison
    public function shopSousCategorieColorPrTLSearch($idCatego, $idSousC, $idColor,$Prix ,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['typechoisirvendeurs.type_livraison',$type],['colors.nom',$idColor],['produits.prix',$Prix]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                         ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
               $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['typechoisirvendeurs.type_livraison',$type],['colors.nom',$idColor],['produits.prix',$Prix]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,0,$Prix,0,$type)); 
    }

//Couleur*Prix*Ville*Type_livraison
    public function shopSousCategorieColorPrVTLSearch($idCatego, $idSousC, $idColor,$Prix ,$idVille,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['typechoisirvendeurs.type_livraison',$type],['colors.nom',$idColor],['produits.prix',$Prix]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['typechoisirvendeurs.type_livraison',$type],['colors.nom',$idColor],['produits.prix',$Prix]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
         
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,0,$Prix,$idVille,$type)); 
    }

//Couleur*Prix*Type_livraison*Ville
    public function shopSousCategorieColorPrTLVSearch($idCatego, $idSousC, $idColor,$Prix ,$type,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit =  \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['typechoisirvendeurs.type_livraison',$type],['colors.nom',$idColor],['produits.prix',$Prix]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['typechoisirvendeurs.type_livraison',$type],['colors.nom',$idColor],['produits.prix',$Prix]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,0,$Prix,$idVille,$type)); 
    }

//Couleur*Prix*Taille*Ville
    public function shopSousCategorieColorPTVSearch($idCatego, $idSousC, $idColor,$Prix ,$idTaille,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit =  \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,$idVille,0)); 
    }

//Couleur*Prix*Taille*Type_Livraison
    public function shopSousCategorieColorPTTLSearch($idCatego, $idSousC, $idColor,$Prix ,$idTaille,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit =  \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type],['produits.prix',$Prix]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type],['produits.prix',$Prix]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,0,$type)); 
    }

//Couleur*Prix*Taille*Ville*Type_Livraison
    public function shopSousCategorieColorPTVTLSearch($idCatego, $idSousC, $idColor,$Prix ,$idTaille,$idVille,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit =  \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type],['produits.prix',$Prix]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type],['produits.prix',$Prix]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,$idVille,$type)); 
    }

//Couleur*Prix*Taille*Type_Livraison*Ville
    public function shopSousCategorieColorPTTLVSearch($idCatego, $idSousC, $idColor,$Prix ,$idTaille,$type,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit =   \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type],['produits.prix',$prix]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type],['produits.prix',$prix]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,$idVille,$type)); 
    }
//Couleur*Taille*Prix*Ville
    public function shopSousCategorieColorTPrVSearch($idCatego, $idSousC, $idColor,$idTaille,$Prix,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
         
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,$idVille,0)); 
    }

//Couleur*Taille*Prix*Type_Laivraison
    public function shopSousCategorieColorTPrTLSearch($idCatego, $idSousC, $idColor,$idTaille,$Prix,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit =\DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix],['typechoisirvendeurs.type_livraison',$type]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix],['typechoisirvendeurs.type_livraison',$type]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,0,$type)); 
    }

//Couleur*Taille*Prix*Ville*Type_Laivraison
    public function shopSousCategorieColorTPrVTLSearch($idCatego, $idSousC, $idColor,$idTaille,$Prix,$idVille,$type){
               if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix],['typechoisirvendeurs.type_livraison',$type]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix],['typechoisirvendeurs.type_livraison',$type]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }

          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,$idVille,$type)); 
    }

//Couleur*Taille*Prix*Type_Laivraison*Ville
    public function shopSousCategorieColorTPrTLVSearch($idCatego, $idSousC, $idColor,$idTaille,$Prix,$type,$idVille){
         if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix],['typechoisirvendeurs.type_livraison',$type]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix],['typechoisirvendeurs.type_livraison',$type]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,$idVille,$type)); 
    }

//Couleur*Ville
    public function shopSousCategorieColorVSearch($idCatego, $idSousC, $idColor,$idVille){
         if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['colors.nom',$idColor]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['colors.nom',$idColor]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,0,0,$idVille,0)); 
    }

//Couleur*Type_Livraison
    public function shopSousCategorieColorTLSearch($idCatego, $idSousC, $idColor,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['typechoisirvendeurs.type_livraison',$type],['colors.nom',$idColor]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['typechoisirvendeurs.type_livraison',$type],['colors.nom',$idColor]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,0,0,0,$type)); 
    }

//Couleur*Ville*Type_Laivraison
    public function shopSousCategorieColorVTLTSearch($idCatego, $idSousC, $idColor,$idVille,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,0,0,$idVille,$type)); 
    }

//Couleur*Type_Laivraison*Ville
    public function shopSousCategorieColorTLVTPrSearch($idCatego, $idSousC, $idColor,$type,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,0,0,$idVille,$type)); 
    }

//Couleur*Taille*Ville
    public function shopSousCategorieColorTVSearch($idCatego, $idSousC, $idColor,$idTaille,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,0,$idVille,0)); 
    }

//Couleur*Taille*Type_Livraison
    public function shopSousCategorieColorTTLSearch($idCatego, $idSousC, $idColor,$idTaille,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['typechoisirvendeurs.type_livraison',$type],['taille_produits.nom',$idTaille],['colors.nom',$idColor]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                  $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['typechoisirvendeurs.type_livraison',$type],['taille_produits.nom',$idTaille],['colors.nom',$idColor]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
         
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,0,0,$type)); 
    }

//Couleur*Taille*Ville*Type_Livraison
    public function shopSousCategorieColorTVTLSearch($idCatego, $idSousC, $idColor,$idTaille,$idVille,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['typechoisirvendeurs.type_livraison',$type],['taille_produits.nom',$idTaille],['colors.nom',$idColor]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['typechoisirvendeurs.type_livraison',$type],['taille_produits.nom',$idTaille],['colors.nom',$idColor]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,0,$idVille,$type)); 
    }

//Couleur*Taille*Type_Livraison*Ville
    public function shopSousCategorieColorTTLVSearch($idCatego, $idSousC, $idColor,$idTaille,$type,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['typechoisirvendeurs.type_livraison',$type],['taille_produits.nom',$idTaille],['colors.nom',$idColor]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['typechoisirvendeurs.type_livraison',$type],['taille_produits.nom',$idTaille],['colors.nom',$idColor]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,0,$idVille,$type)); 
    }

/************************************* PRIX***********************************/

//Prix
     public function shopSousCategoriePrixSearch($idCatego, $idSousC, $Prix){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();

            }
            else{
                $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,0,$Prix,0,0)); 
    }

//Prix*Coleur
     public function shopSousCategoriePrixCSearch($idCatego, $idSousC, $Prix,$idColor){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['colors.nom',$idColor]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();

            }
            else{
                $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['colors.nom',$idColor]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,0,$Prix,0,0)); 
    }

//Prix*Coleur*Taille
     public function shopSousCategoriePrixCTSearch($idCatego, $idSousC, $Prix,$idColor,$idTaille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['colors.nom',$idColor],['taille_produits.nom',$idTaille]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();

            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['colors.nom',$idColor],['taille_produits.nom',$idTaille]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,0,0)); 
    }

//Prix*Taille
     public function shopSousCategoriePrixTSearch($idCatego, $idSousC, $Prix,$idTaille){
          if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();

            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }

         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,$idTaille,$Prix,0,0)); 
    }

//Prix*Taille*Coleur
     public function shopSousCategoriePrixTCSearch($idCatego, $idSousC, $Prix,$idTaille,$idColor){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['colors.nom',$idColor],['taille_produits.nom',$idTaille]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();

            }
            else{
                $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['colors.nom',$idColor],['taille_produits.nom',$idTaille]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }

          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,0,0)); 
    }

//Prix*Ville
    public function shopSousCategoriePrixVSearch($idCatego, $idSousC, $Prix,$idVille){
         if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['produits.prix',$Prix]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();

            }
            else{
                $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['produits.prix',$Prix]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,0,$Prix,$idVille,0)); 
    }

//Prix*type_livraison
    public function shopSousCategoriePrixTLSearch($idCatego, $idSousC, $Prix,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['typechoisirvendeurs.type_livraison',$type]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['typechoisirvendeurs.type_livraison',$type]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,0,$Prix,0,$type)); 
    }

//Prix*Ville*type_livraison
    public function shopSousCategoriePrixVTLSearch($idCatego, $idSousC, $Prix,$idVille,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,0,$Prix,$idVille,$type)); 
    }

//Prix*type_livraison*Ville
    public function shopSousCategoriePrixTLVSearch($idCatego, $idSousC, $Prix,$type,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();

            }
            else{
                $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,0,$Prix,$idVille,$type)); 
    }

//Prix*Taille*ville
    public function shopSousCategoriePrixTVSearch($idCatego, $idSousC, $Prix,$idTaille,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();

            }
            else{
                $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,$idTaille,$Prix,$idVille,0)); 
    }

//Prix*Taille*type_livraison
    public function shopSousCategoriePrixTTLSearch($idCatego, $idSousC, $Prix,$idTaille,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['typechoisirvendeurs.type_livraison',$type]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['typechoisirvendeurs.type_livraison',$type]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,$idTaille,$Prix,0,$type)); 
    }

//Prix*Taille*Ville*type_livraison
    public function shopSousCategoriePrixTVTLSearch($idCatego, $idSousC, $Prix,$idTaille,$idVille,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,$idTaille,$Prix,$idVille,$type)); 
    }

//Prix*Taille*type_livraison*Ville
    public function shopSousCategoriePrixTTLVSearch($idCatego, $idSousC, $Prix,$idTaille,$type,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit =  \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();

            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,$idTaille,$Prix,$idVille,$type)); 
    }

//Prix*Coleur*Ville
    public function shopSousCategoriePrixCVSearch($idCatego, $idSousC, $Prix,$idColor,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['produits.prix',$Prix],['colors.nom',$idColor]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();

            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['produits.prix',$Prix],['colors.nom',$idColor]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,0,$Prix,$idVille,0)); 
    }

//Prix*Coleur*type_livraison
    public function shopSousCategoriePrixCTLSearch($idCatego, $idSousC, $Prix,$idColor,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['typechoisirvendeurs.type_livraison',$type],['produits.prix',$Prix],['colors.nom',$idColor]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['typechoisirvendeurs.type_livraison',$type],['produits.prix',$Prix],['colors.nom',$idColor]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,0,$Prix,0,$type)); 
    }

//Prix*Coleur*Ville*type_livraison
    public function shopSousCategoriePrixCVTLSearch($idCatego, $idSousC, $Prix,$idColor,$idVille,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit =  \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille],['produits.prix',$Prix],['colors.nom',$idColor]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille],['produits.prix',$Prix],['colors.nom',$idColor]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,0,$Prix,$idVille,$type)); 
    }

//Prix*Coleur*type_livraison*Ville
    public function shopSousCategoriePrixCTLVSearch($idCatego, $idSousC, $Prix,$idColor,$type,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille],['produits.prix',$Prix],['colors.nom',$idColor]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille],['produits.prix',$Prix],['colors.nom',$idColor]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,0,$Prix,$idVille,$type)); 
    }

//Prix*Taille*Couleur*Ville
    public function shopSousCategoriePrixTCVSearch($idCatego, $idSousC, $Prix,$idTaille,$idColor,$idVille){
         if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['vendeurs.ville',$idVille],['colors.nom',$idColor]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['vendeurs.ville',$idVille],['colors.nom',$idColor]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,$idVille,0)); 
    }

//Prix*Taille*Couleur*type_livraison
    public function shopSousCategoriePrixTCTLSearch($idCatego, $idSousC, $Prix,$idTaille,$idColor,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,0,$type)); 
    }

//Prix*Taille*Couleur*Ville*type_livraison
    public function shopSousCategoriePrixTCVTLSearch($idCatego, $idSousC, $Prix,$idTaille,$idColor,$idVille,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,$idVille,$type)); 
    }

//Prix*Taille*Couleur*type_livraison*Ville
    public function shopSousCategoriePrixTCTLVSearch($idCatego, $idSousC, $Prix,$idTaille,$idColor,$type,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,$idVille,$type)); 
    }

//Prix*Couleur*Taille*Ville
    public function shopSousCategoriePrixCTVSearch($idCatego, $idSousC, $Prix,$idColor,$idTaille,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit =  \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['vendeurs.ville',$idVille],['colors.nom',$idColor]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['vendeurs.ville',$idVille],['colors.nom',$idColor]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,$idVille,0)); 
    }

//Prix*Couleur*Taille*type_livraison
    public function shopSousCategoriePrixCTTLSearch($idCatego, $idSousC, $Prix,$idColor,$idTaille,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit =  \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,0,$type)); 
    }

//Prix*Couleur*Taille*Ville*type_livraison
    public function shopSousCategoriePrixCTVTLSearch($idCatego, $idSousC, $Prix,$idColor,$idTaille,$idVille,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,$idVille,$type)); 
    }

//Prix*Couleur*Taille*type_livraison*Ville
    public function shopSousCategoriePrixCTTLVSearch($idCatego, $idSousC, $Prix,$idColor,$idTaille,$type,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,$idVille,$type)); 
    }
/************************************* TAILLE***********************************/
//taille
    public function shopSousCategorieTailleSearch($idCatego,$idSousC,$idTaille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->where([['sous_categories.id',$idSousC],['taille_produits.nom',$idTaille]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->where([['sous_categories.id',$idSousC],['taille_produits.nom',$idTaille]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
         
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,$idTaille,0,0,0)); 
    }

//Taille*Couleur
    public function shopSousCategorieTailleCSearch($idCatego, $idSousC,$idTaille, $idColor){
         if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->where([['sous_categories.id',$idSousC],['taille_produits.nom',$idTaille],['colors.nom',$idColor]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->where([['sous_categories.id',$idSousC],['taille_produits.nom',$idTaille],['colors.nom',$idColor]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,0,0,0)); 
    }

//Taille*Prix
    public function shopSousCategorieTaillePSearch($idCatego, $idSousC,$idTaille, $Prix){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,$idTaille,$Prix,0,0)); 
    }

//Taille*Coleur*Prix
     public function shopSousCategorieTailleCPSearch($idCatego, $idSousC,$idTaille,$idColor, $Prix){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['colors.nom',$idColor],['taille_produits.nom',$idTaille]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['colors.nom',$idColor],['taille_produits.nom',$idTaille]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,0,0)); 
    }

//Taille*Prix*Coleur
     public function shopSousCategorieTaillePCSearch($idCatego, $idSousC,$idTaille,$Prix,$idColor){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
         ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
         ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
         ->join('taille_produits','taille_produits.produit_id','=','produits.id')
         ->join('color_produits','color_produits.produit_id','=','produits.id')
         ->join('colors','colors.id','=','color_produits.color_id')
         ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['colors.nom',$idColor],['taille_produits.nom',$idTaille]])
         ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
         ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
         ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
         ->get();
            }
            else{
                $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['colors.nom',$idColor],['taille_produits.nom',$idTaille]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,0,0)); 
    }

//Taille*Prix*Couleur*Ville
    public function shopSousCategorieTaillePCVSearch($idCatego, $idSousC,$idTaille, $Prix,$idColor,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['vendeurs.ville',$idVille],['colors.nom',$idColor]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['vendeurs.ville',$idVille],['colors.nom',$idColor]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,$idVille,0)); 
    }

//Taille*Prix*Couleur*type_livraison
    public function shopSousCategorieTaillePCTLSearch($idCatego, $idSousC,$idTaille,$Prix,$idColor,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();

            }
           return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,0,$type)); 
    }

//Taille*Prix*Couleur*Ville*type_livraison
    public function shopSousCategorieTaillePCVTLSearch($idCatego, $idSousC,$idTaille, $Prix,$idColor,$idVille,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();

            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,$idVille,$type)); 
    }

//Taille*Prix*Couleur*type_livraison*Ville
    public function shopSousCategorieTaillePCTLVSearch($idCatego, $idSousC,$idTaille, $Prix,$idColor,$type,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();

            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,$idVille,$type)); 
    }

//Taille*Couleur*Prix*Ville
    public function shopSousCategorieTailleCPVSearch($idCatego, $idSousC,$idTaille, $idColor,$Prix,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();

            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,$idVille,0)); 
    }

//Taille*Couleur*Prix*Type_Laivraison
    public function shopSousCategorieTailleCPTLSearch($idCatego, $idSousC,$idTaille, $idColor,$Prix,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix],['typechoisirvendeurs.type_livraison',$type]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix],['typechoisirvendeurs.type_livraison',$type]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();

            }
         
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,0,$type)); 
    }

//Taille*Couleur*Prix*Ville*Type_Laivraison
    public function shopSousCategorieTailleCPVTLSearch($idCatego, $idSousC,$idTaille, $idColor,$Prix,$idVille,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix],['typechoisirvendeurs.type_livraison',$type]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix],['typechoisirvendeurs.type_livraison',$type]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();

            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,$idVille,$type)); 
    }

//Taille*Couleur*Prix*Type_Laivraison*Ville
    public function shopSousCategorieTailleCPTLVSearch($idCatego, $idSousC,$idTaille, $idColor,$Prix,$type,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix],['typechoisirvendeurs.type_livraison',$type]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
    
            }
            else{
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                 ->join('taille_produits','taille_produits.produit_id','=','produits.id')
                 ->join('color_produits','color_produits.produit_id','=','produits.id')
                 ->join('colors','colors.id','=','color_produits.color_id')
                 ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
                 ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor],['produits.prix',$Prix],['typechoisirvendeurs.type_livraison',$type]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();

            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,$Prix,$idVille,$type)); 
    }

//Taille*Prix*ville
    public function shopSousCategorieTaillePVSearch($idCatego, $idSousC,$idTaille, $Prix,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            
            }
            else{
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();

            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,$idTaille,$Prix,$idVille,0)); 
    }

//Taille*Prix*type_livraison
    public function shopSousCategorieTaillePTLSearch($idCatego, $idSousC,$idTaille, $Prix,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['typechoisirvendeurs.type_livraison',$type]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['typechoisirvendeurs.type_livraison',$type]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();

            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,$idTaille,$Prix,0,$type)); 
    }

//Taille*Prix*Ville*type_livraison
    public function shopSousCategorieTaillePVTLSearch($idCatego, $idSousC,$idTaille, $Prix,$idVille,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();

            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,$idTaille,$Prix,$idVille,$type)); 
    }

//Taille*Prix*type_livraison*Ville
    public function shopSousCategorieTaillePTLVSearch($idCatego, $idSousC,$idTaille, $Prix,$type,$idVille){
         if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['produits.prix',$Prix],['taille_produits.nom',$idTaille],['typechoisirvendeurs.type_livraison',$type],['vendeurs.ville',$idVille]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();

            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,$idTaille,$Prix,$idVille,$type)); 
    }

//Taille*Couleur*Ville
    public function shopSousCategorieTailleCVSearch($idCatego, $idSousC,$idTaille, $idColor,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                  $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille],['colors.nom',$idColor]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();

            }
         
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,0,$idVille,0)); 
    }

//Taille*Couleur*Type_Livraison
    public function shopSousCategorieTailleCTLSearch($idCatego, $idSousC,$idTaille, $idColor,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['typechoisirvendeurs.type_livraison',$type],['taille_produits.nom',$idTaille],['colors.nom',$idColor]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                  $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['typechoisirvendeurs.type_livraison',$type],['taille_produits.nom',$idTaille],['colors.nom',$idColor]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();

            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,0,0,$type)); 
    }

//Taille*Couleur*Ville*Type_Livraison
    public function shopSousCategorieTailleCVTLSearch($idCatego, $idSousC,$idTaille, $idColor,$idVille,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['typechoisirvendeurs.type_livraison',$type],['taille_produits.nom',$idTaille],['colors.nom',$idColor]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();

            }
            else{
                  $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['typechoisirvendeurs.type_livraison',$type],['taille_produits.nom',$idTaille],['colors.nom',$idColor]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();

            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,0,$idVille,$type)); 
    }

//Taille*Couleur*Type_Livraison*Ville
    public function shopSousCategorieTailleTLVCSearch($idCatego, $idSousC,$idTaille, $idColor,$type,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['typechoisirvendeurs.type_livraison',$type],['taille_produits.nom',$idTaille],['colors.nom',$idColor]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                  $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('color_produits','color_produits.produit_id','=','produits.id')
             ->join('colors','colors.id','=','color_produits.color_id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['typechoisirvendeurs.type_livraison',$type],['taille_produits.nom',$idTaille],['colors.nom',$idColor]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();

            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,$idColor,$idTaille,0,$idVille,$type)); 
    }

//Taille*Ville
    public function shopSousCategorieTailleVSearch($idCatego, $idSousC,$idTaille, $idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();

            }
            else{
                  $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['taille_produits.nom',$idTaille]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }

          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,$idTaille,0,$idVille,0)); 
    }

//Taille*type_livraison
    public function shopSousCategorieTailleTLSearch($idCatego, $idSousC,$idTaille,$type){if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['typechoisirvendeurs.type_livraison',$type],['taille_produits.nom',$idTaille]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                  $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['typechoisirvendeurs.type_livraison',$type],['taille_produits.nom',$idTaille]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }

          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,$idTaille,0,0,$type)); 
    }

//Taille*Ville*Type_Livraison
    public function shopSousCategorieTailleVTLSearch($idCatego, $idSousC,$idTaille,$idVille,$type){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['typechoisirvendeurs.type_livraison',$type],['taille_produits.nom',$idTaille]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                  $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['typechoisirvendeurs.type_livraison',$type],['taille_produits.nom',$idTaille]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }

          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,$idTaille,0,$idVille,$type)); 
    }

//Taille*Type_Livraison*Ville
    public function shopSousCategorieTailleTLVSearch($idCatego, $idSousC,$idTaille,$type,$idVille){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['typechoisirvendeurs.type_livraison',$type],['taille_produits.nom',$idTaille]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
            else{
                  $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('taille_produits','taille_produits.produit_id','=','produits.id')
             ->join('typechoisirvendeurs','typechoisirvendeurs.vendeur_id','=','vendeurs.id')
             ->where([['sous_categories.id',$idSousC],['vendeurs.ville',$idVille],['typechoisirvendeurs.type_livraison',$type],['taille_produits.nom',$idTaille]])
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get();
            }
          
         return view('shopCategorie',['produit'=> $produit])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,$idTaille,0,$idVille,$type)); 
    }
/************************************************ ***********************************************/ 
    public function shopSousCategorieSearch($idCatego, $idSousC){
        if(auth()->check() && Auth::user()->type_compte == 'c'){
                $client =  Client::find(Auth::user()->id);
                 $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                ->join('paiement_vendeurs','paiement_vendeurs.vendeur_id', '=', 'produits.vendeur_id')
                 ->where([['sous_categories.id',$idSousC],['response',1]])
                 ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
                 ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
            else{
                  $produit = \DB::table('produits')
                 ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
                 ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
                ->join('paiement_vendeurs','paiement_vendeurs.vendeur_id', '=', 'produits.vendeur_id')
                 ->where([['sous_categories.id',$idSousC],['response',1]])
                 ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
                 ->get();
            }
        
         return view('shopCategorie',['produit'=> $produit,])->with($this->shopSearchGlobal($idCatego))->with($this->selectt($idSousC,0,0,0,0,0)); 
    }

public function emploiVilleSousCategoSearch($id,$idVille,$idSC){
        \DB::table('paiement_employeurs')
        ->where('paiment_par','a')
        ->whereDay('updated_at', '<', Carbon::now()->format('d') )->delete();
        \DB::table('paiement_employeurs')
        ->where('paiment_par','m')
        ->whereMonth('updated_at', '<', Carbon::now()->format('m') )->delete();

        $idd = \DB::table('sous_categories')->where('id',$idSC)->select('libelle')->get();
        $idville = \DB::table('villes')->where('nom',$idVille)->select('nom')->get();
        $ville = \DB::table("villes")->orderBy("nom")->get();
        if($id == 1){
             $sousC = \DB::table('annonce_emploies')
                ->join("sous_categories",'sous_categories.id','=','annonce_emploies.sous_categorie_id')->distinct('sous_categories.id')->select('sous_categories.*')->where('sous_categories.categorie_id',1)->get();

        }
        else{
            $sousC = \DB::table('sous_categories')->where([['categorie_id',$id]])->get();
        }
        if(auth()->check() && Auth::user()->type_compte == 'c'){

            $emploi = \DB::table('annonce_emploies')
            ->join('employeurs','employeurs.id','=','employeur_id')
            ->join('paiement_employeurs','paiement_employeurs.employeur_id', '=', 'annonce_emploies.employeur_id')
            ->select('annonce_emploies.*')
            ->where([['sous_categorie_id',$idSC],['employeurs.ville',$idVille],['response',1]])
            ->whereNotIn('annonce_emploies.employeur_id',\DB::table('signals')->where([['client_id',$c->id],['signals.employeur_id','<>',null]])->pluck('signals.employeur_id')->toArray())
            ->whereNotIn('annonce_emploies.id',\DB::table('signals')->where([['client_id',$c->id],['signals.annonce_emploi_id','<>',null]])->pluck('signals.annonce_emploi_id')->toArray())
            ->orderBy('annonce_emploies.created_at','desc')->paginate(21) ;

            
            
            $c = Client::find(Auth::user()->id);
            $favoris = \DB::table('produits')->get();
            $imageproduit = \DB::table('imageproduits')->get();
            $command = \DB::table('commandes')->where([['commande_envoyee',0]])->get();     
            
            
            $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
            $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
            $fav = \DB::table('favoris')->where('client_id',$c->id)->get();
             $c->nom= ucwords($c->nom);
             $c->prenom= ucwords($c->prenom);
            return view('emploiCategorie',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav,'sousC' => $sousC,'id'=>$idd,'idville'=>$idville,'ville'=>$ville]);
        }
        $emploi = \DB::table('annonce_emploies')
            ->join('employeurs','employeurs.id','=','employeur_id')
            ->join('paiement_employeurs','paiement_employeurs.employeur_id', '=', 'annonce_emploies.employeur_id')
            ->select('annonce_emploies.*')
            ->where([['sous_categorie_id',$idSC],['employeurs.ville',$idVille],['response',1]])
            ->orderBy('annonce_emploies.created_at','desc')->paginate(21) ;
        $c['nom'] = "";
        $c['prenom'] = "";
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = array();     
        $fav = array();
        
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }
        return view('emploiCategorie',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE        ,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav,'sousC' => $sousC,'id'=>$idd,'idville'=>$idville,'ville'=>$ville]);
    }


    public function emploiSousCategoVilleSearch($id,$idSC,$idVille){
        \DB::table('paiement_employeurs')
        ->where('paiment_par','a')
        ->whereDay('updated_at', '<', Carbon::now()->format('d') )->delete();
        \DB::table('paiement_employeurs')
        ->where('paiment_par','m')
        ->whereMonth('updated_at', '<', Carbon::now()->format('m') )->delete();
        
        $idd = \DB::table('sous_categories')->where('id',$idSC)->select('libelle')->get();
        $idville = \DB::table('villes')->where('nom',$idVille)->select('nom')->get();
        $ville = \DB::table("villes")->orderBy("nom")->get();
        if($id == 1){
             $sousC = \DB::table('annonce_emploies')
                ->join("sous_categories",'sous_categories.id','=','annonce_emploies.sous_categorie_id')->distinct('sous_categories.id')->select('sous_categories.*')->where('sous_categories.categorie_id',1)->get();

        }
        else{
            $sousC = \DB::table('sous_categories')->where([['categorie_id',$id]])->get();
        }
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $c = Client::find(Auth::user()->id);
            $emploi = \DB::table('annonce_emploies')
            ->join('employeurs','employeurs.id','=','employeur_id')
            ->join('paiement_employeurs','paiement_employeurs.employeur_id', '=', 'annonce_emploies.employeur_id')
            ->where([['sous_categorie_id',$idSC],['employeurs.ville',$idVille],['response',1]])
            ->whereNotIn('annonce_emploies.employeur_id',\DB::table('signals')->where([['client_id',$c->id],['signals.employeur_id','<>',null]])->pluck('signals.employeur_id')->toArray())
            ->whereNotIn('annonce_emploies.id',\DB::table('signals')->where([['client_id',$c->id],['signals.annonce_emploi_id','<>',null]])->pluck('signals.annonce_emploi_id')->toArray())
            ->select('annonce_emploies.*')
            ->orderBy('annonce_emploies.created_at','desc')->paginate(21) ;
            $favoris = \DB::table('produits')->get();
            $imageproduit = \DB::table('imageproduits')->get();
            $command = \DB::table('commandes')->where([['commande_envoyee',0]])->get();     
            $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
            $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
            $fav = \DB::table('favoris')->where('client_id',$c->id)->get();
             $c->nom= ucwords($c->nom);
             $c->prenom= ucwords($c->prenom);
            return view('emploiCategorie',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav,'sousC' => $sousC,'id'=>$idd,'idville'=>$idville,'ville'=>$ville]);
        }
        $emploi = \DB::table('annonce_emploies')
            ->join('employeurs','employeurs.id','=','employeur_id')
            ->join('paiement_employeurs','paiement_employeurs.employeur_id', '=', 'annonce_emploies.employeur_id')
            ->where([['sous_categorie_id',$idSC],['employeurs.ville',$idVille],['response',1]])
            ->select('annonce_emploies.*')
            ->orderBy('annonce_emploies.created_at','desc')->paginate(21) ;
        $c['nom'] = "";
        $c['prenom'] = "";
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = array();     
        $fav = array();
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }
        return view('emploiCategorie',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE        ,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav,'sousC' => $sousC,'id'=>$idd,'idville'=>$idville,'ville'=>$ville]);
    }



    public function emploiVilleSearch($id,$idVille){
        \DB::table('paiement_employeurs')
        ->where('paiment_par','a')
        ->whereDay('updated_at', '<', Carbon::now()->format('d') )->delete();
        \DB::table('paiement_employeurs')
        ->where('paiment_par','m')
        ->whereMonth('updated_at', '<', Carbon::now()->format('m') )->delete();
        
        $idd = 0;
        $idville = \DB::table('villes')->where('nom',$idVille)->select('nom')->get();
        $ville = \DB::table("villes")->orderBy("nom")->get();
        if($id == 1){
             $sousC = \DB::table('annonce_emploies')
                ->join("sous_categories",'sous_categories.id','=','annonce_emploies.sous_categorie_id')->distinct('sous_categories.id')->select('sous_categories.*')->where('sous_categories.categorie_id',1)->get();

        }
        else{
            $sousC = \DB::table('sous_categories')->where([['categorie_id',$id]])->get();
        }
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $c = Client::find(Auth::user()->id);
            $emploi = \DB::table('annonce_emploies')
            ->join('sous_categories','sous_categories.id','=','annonce_emploies.sous_categorie_id')
            ->join('employeurs','employeurs.id','=','employeur_id')
            ->join('paiement_employeurs','paiement_employeurs.employeur_id', '=', 'annonce_emploies.employeur_id')
            ->select('annonce_emploies.*')
            ->where([['sous_categories.categorie_id',$id],['employeurs.ville',$idVille],['response',1]])
            ->whereNotIn('annonce_emploies.employeur_id',\DB::table('signals')->where([['client_id',$c->id],['signals.employeur_id','<>',null]])->pluck('signals.employeur_id')->toArray())
            ->whereNotIn('annonce_emploies.id',\DB::table('signals')->where([['client_id',$c->id],['signals.annonce_emploi_id','<>',null]])->pluck('signals.annonce_emploi_id')->toArray())
            ->orderBy('annonce_emploies.created_at','desc')->paginate(21) ;
            $favoris = \DB::table('produits')->get();
            $imageproduit = \DB::table('imageproduits')->get();
            $command = \DB::table('commandes')->where([['commande_envoyee',0]])->get();     
            $sousC = \DB::table('sous_categories')->where([['categorie_id',$id]])->get();
            
            $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
            $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
            $fav = \DB::table('favoris')->where('client_id',$c->id)->get();
             $c->nom= ucwords($c->nom);
             $c->prenom= ucwords($c->prenom);
            return view('emploiCategorie',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav,'sousC' => $sousC,'id'=>$idd,'idville'=>$idville,'ville'=>$ville]);
        }
        $emploi = \DB::table('annonce_emploies')
            ->join('sous_categories','sous_categories.id','=','annonce_emploies.sous_categorie_id')
            ->join('employeurs','employeurs.id','=','employeur_id')
            ->join('paiement_employeurs','paiement_employeurs.employeur_id', '=', 'annonce_emploies.employeur_id')
            ->select('annonce_emploies.*')
            ->where([['sous_categories.categorie_id',$id],['employeurs.ville',$idVille],['response',1]])
            ->orderBy('annonce_emploies.created_at','desc')->paginate(21) ;
        $c['nom'] = "";
        $c['prenom'] = "";
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = array();     
        $fav = array();
        $sousC = \DB::table('sous_categories')->where([['categorie_id',$id]])->get();
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }
        return view('emploiCategorie',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE        ,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav,'sousC' => $sousC,'id'=>$idd,'idville'=>$idville,'ville'=>$ville]);
    }

 public function emploiSousCategorieSearch($id,$id1){
    \DB::table('paiement_employeurs')
        ->where('paiment_par','a')
        ->whereDay('updated_at', '<', Carbon::now()->format('d') )->delete();
        \DB::table('paiement_employeurs')
        ->where('paiment_par','m')
        ->whereMonth('updated_at', '<', Carbon::now()->format('m') )->delete();
        $ville = \DB::table("villes")->orderBy("nom")->get();
        if($id == 1){
             $sousC = \DB::table('annonce_emploies')
                ->join("sous_categories",'sous_categories.id','=','annonce_emploies.sous_categorie_id')->distinct('sous_categories.id')->select('sous_categories.*')->where('sous_categories.categorie_id',1)->get();

        }
        else{
            $sousC = \DB::table('sous_categories')->where([['categorie_id',$id]])->get();
        }
        $idd = \DB::table('sous_categories')->where('id',$id1)->select('libelle')->get();
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $c = Client::find(Auth::user()->id);
            $emploi = \DB::table('annonce_emploies')
            ->join('paiement_employeurs','paiement_employeurs.employeur_id', '=', 'annonce_emploies.employeur_id')
            ->where([['sous_categorie_id',$id1],['response',1]])
            ->whereNotIn('annonce_emploies.employeur_id',\DB::table('signals')->where([['client_id',$c->id],['signals.employeur_id','<>',null]])->pluck('signals.employeur_id')->toArray())
            ->whereNotIn('annonce_emploies.id',\DB::table('signals')->where([['client_id',$c->id],['signals.annonce_emploi_id','<>',null]])->pluck('signals.annonce_emploi_id')->toArray())
            ->select('annonce_emploies.*')
            ->orderBy('annonce_emploies.created_at','desc')->paginate(21) ;
            $favoris = \DB::table('produits')->get();
            $imageproduit = \DB::table('imageproduits')->get();
            $command = \DB::table('commandes')->where([['commande_envoyee',0]])->get();     
            
            $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
            $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
            $fav = \DB::table('favoris')->where('client_id',$c->id)->get();
             $c->nom= ucwords($c->nom);
             $c->prenom= ucwords($c->prenom);
            return view('emploiCategorie',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav,'sousC' => $sousC,'id'=>$idd,'ville'=>$ville, 'idville'=>0]);
        }
        $emploi = \DB::table('annonce_emploies')
        ->join('paiement_employeurs','paiement_employeurs.employeur_id', '=', 'annonce_emploies.employeur_id')
            ->where([['sous_categorie_id',$id1],['response',1]])
            ->select('annonce_emploies.*')
            ->orderBy('annonce_emploies.created_at','desc')->paginate(21) ;
        $c['nom'] = "";
        $c['prenom'] = "";
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = array();     
        $fav = array();
        
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }
        return view('emploiCategorie',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE        ,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav,'sousC' => $sousC,'id'=>$idd,'ville'=>$ville, 'idville'=>0]);
    }


    public function shopSearch($id){
        \DB::table('paiement_vendeurs')->whereMonth('updated_at', '<', Carbon::now()->format('m') )->delete();
         $produit = \DB::table('produits')
         ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
         ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
         ->join('paiement_vendeurs','paiement_vendeurs.vendeur_id', '=', 'produits.vendeur_id')
         ->where([['sous_categories.categorie_id',$id],['response',1]])
         ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
         ->get();      

        $priceMin = \DB::table('produits')->select('prix')->min('prix');
        $priceMax = \DB::table('produits')->select('prix')->max('prix'); 
        $ville = \DB::table("villes")->orderBy("nom")->get();

        $imageproduit = \DB::table('imageproduits')->get();
        $color = \DB::table('colors')->join('color_produits', 'colors.id', '=', 'color_produits.color_id')->get();
        $AllColors = \DB::table('colors')->get();
        $taille = \DB::table('taille_produits')->get();
        $typeLivraison = \DB::table('typechoisirvendeurs')->get();
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        
        $favori = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        if($id == 1){
             $sousC = \DB::table('produits')
                ->join("sous_categories",'sous_categories.id','=','produits.sous_categorie_id')->distinct('sous_categories.id')->select('sous_categories.*')->where('sous_categories.categorie_id',1)->get();

        }
        else{
            $sousC = \DB::table('sous_categories')->where([['categorie_id',$id]])->get();
        } 
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $client =  Client::find(Auth::user()->id);
            $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('sous_categories','sous_categories.id','produits.sous_categorie_id')
             ->join('paiement_vendeurs','paiement_vendeurs.vendeur_id', '=', 'produits.vendeur_id')
             ->where([['sous_categories.categorie_id',$id],['response',1]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
             ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
             ->get(); 
            $command = \DB::table('commandes')->where([ ['client_id',$client->id],['id',$client->nbr_cmd]])->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$client->id],['id',$client->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
           $fav = \DB::table('favoris')->where('client_id',$client->id)->get();
            return view('shopCategorie',['produit'=>$produit, 'ImageP' => $imageproduit, 'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille ,'categorie'=>$categorie,'categorieE'=>$categorieE,'fav' => $fav,'command' => $command,'Fav' => $favori,'prixTotale' => $prixTotale,'sousC' => $sousC,'priceMin' => $priceMin,'priceMax' => $priceMax,'AllColors' => $AllColors,'ville'=> $ville,])->with($this->selectt(0,0,0,0,0,0));
        }
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }

        $fav=array(); 
        $command = array();
        return view('shopCategorie',['produit'=>$produit, 'ImageP' => $imageproduit, 'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille ,'categorie'=>$categorie,'categorieE'=>$categorieE,'fav' => $fav,'command' => $command,'Fav' => $favori,'prixTotale' => $prixTotale,'sousC' => $sousC,'priceMin' => $priceMin,'priceMax' => $priceMax,'AllColors' => $AllColors, 'ville'=> $ville,])->with($this->selectt(0,0,0,0,0,0));

    }

    public function emploiSearch($id){
        \DB::table('paiement_employeurs')
        ->where('paiment_par','a')
        ->whereDay('updated_at', '<', Carbon::now()->format('d') )->delete();
        \DB::table('paiement_employeurs')
        ->where('paiment_par','m')
        ->whereMonth('updated_at', '<', Carbon::now()->format('m') )->delete();
        $ville = \DB::table("villes")->orderBy("nom")->get();
        if($id == 1){
            $sousC = \DB::table('annonce_emploies')
                ->join("sous_categories",'sous_categories.id','=','annonce_emploies.sous_categorie_id')->distinct('sous_categories.id')->select('sous_categories.*')->where('sous_categories.categorie_id',1)->get();

        }
        else{
            $sousC = \DB::table('sous_categories')->where([['categorie_id',$id]])->get();
        }
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $c = Client::find(Auth::user()->id);
            $favoris = \DB::table('produits')->get();
            $imageproduit = \DB::table('imageproduits')->get();
            $command = \DB::table('commandes')->where([['commande_envoyee',0]])->get();     
           
            $emploi = \DB::table('annonce_emploies')
            ->join('sous_categories','sous_categories.id','annonce_emploies.sous_categorie_id')
            ->join('paiement_employeurs','paiement_employeurs.employeur_id', '=', 'annonce_emploies.employeur_id')
            ->where([['categorie_id',$id],['response',1]])
            ->whereNotIn('annonce_emploies.employeur_id',\DB::table('signals')->where([['client_id',$c->id],['signals.employeur_id','<>',null]])->pluck('signals.employeur_id')->toArray())
            ->whereNotIn('annonce_emploies.id',\DB::table('signals')->where([['client_id',$c->id],['signals.annonce_emploi_id','<>',null]])->pluck('signals.annonce_emploi_id')->toArray())
            ->select("annonce_emploies.*")
            ->orderBy('annonce_emploies.created_at','desc')->paginate(21) ;
            $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
            $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
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
        
        $emploi = \DB::table('annonce_emploies')
            ->join('sous_categories','sous_categories.id','annonce_emploies.sous_categorie_id')
            ->join('paiement_employeurs','paiement_employeurs.employeur_id', '=', 'annonce_emploies.employeur_id')
            ->where([['categorie_id',$id],['response',1]])
            ->select("annonce_emploies.*")
            ->orderBy('annonce_emploies.created_at','desc')->paginate(21) ;
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }
        return view('emploiCategorie',['emploi'=>$emploi,'categorie'=>$categorie ,'categorieE'=>$categorieE        ,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'client' => $c,'fav' => $fav,'sousC' => $sousC,'id'=>0, 'ville'=> $ville, 'idville'=> 0]);
    }

    public function getAnnonceHome(){
        $favori = \DB::table('annonce_emploies')->get();
         
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $client = Client::find(Auth::user()->id);
            $annonce = \DB::table('annonce_emploies')
         ->join('employeurs','employeurs.id', '=', 'annonce_emploies.employeur_id')
         ->join('paiement_employeurs','paiement_employeurs.employeur_id', '=', 'annonce_emploies.employeur_id')
         ->select('employeurs.Nom', 'employeurs.Prenom', 'annonce_emploies.*')
         ->where("response",1)
         ->whereNotIn('annonce_emploies.employeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.employeur_id','<>',null]])->pluck('signals.employeur_id')->toArray())
            ->whereNotIn('annonce_emploies.id',\DB::table('signals')->where([['client_id',$client->id],['signals.annonce_emploi_id','<>',null]])->pluck('signals.annonce_emploi_id')->toArray())
         ->take(24)->get(); 
            $client->nom= ucwords($client->nom);
             $client->prenom= ucwords($client->prenom);
            return ['annonce'=>$annonce,'client' => $client];
        }
        $annonce = \DB::table('annonce_emploies')
         ->join('employeurs','employeurs.id', '=', 'annonce_emploies.employeur_id')
         ->join('paiement_employeurs','paiement_employeurs.employeur_id', '=', 'annonce_emploies.employeur_id')
         ->select('employeurs.Nom', 'employeurs.Prenom', 'annonce_emploies.*')
         ->where("response",1)
         ->take(24)->get(); 
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
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
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
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }    
        return view('apropos',['categorie'=>$categorie,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale]);
    }

    public function produitVisiteur()
    {
        \DB::table('paiement_vendeurs')->whereMonth('updated_at', '<', Carbon::now()->format('m') )->delete();
        $produit = \DB::table('produits')
        ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
        ->join('paiement_vendeurs','paiement_vendeurs.vendeur_id', '=', 'produits.vendeur_id')
        ->where('response',1)
        ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')
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
            $produit = \DB::table('produits')
            ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
            ->join('paiement_vendeurs','paiement_vendeurs.vendeur_id', '=', 'produits.vendeur_id')
            ->where('response',1)
            ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
            ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
            ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*','vendeurs.Addresse','vendeurs.Nom_boutique')                      
            ->get();
            $command = \DB::table('commandes')->where([ ['client_id',$client->id],['id',$client->nbr_cmd]])->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$client->id],['id',$client->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
           $fav = \DB::table('favoris')->where('client_id',$client->id)->get();
            return view('shop',['produit'=>$produit, 'ImageP' => $imageproduit, 'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille ,'categorie'=>$categorie,'categorieE'=>$categorieE,'fav' => $fav,'command' => $command,'Fav' => $favori,'prixTotale' => $prixTotale]);
        }
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
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
        ->take(3)->get() ;
        return ['allArticle' => $allArticle];
    }

    public function getImageD($id){
            $image = \DB::table('imageproduits')->where('imageproduits.produit_id',$id)->get();
            return ['imagee'=>$image];
    }

    public function getProduitHome(){
        \DB::table('paiement_vendeurs')->whereMonth('updated_at', '<', Carbon::now()->format('m') )->delete();
        $favori = \DB::table('produits')->get();    
        
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $client =  Client::find(Auth::user()->id);
            $command = \DB::table('commandes')->where([ ['client_id',$client->id],['id',$client->nbr_cmd]])->get();
            $produit = \DB::table('produits')
             ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
             ->join('imageproduits','imageproduits.produit_id', '=', 'produits.id')
             ->join('paiement_vendeurs','paiement_vendeurs.vendeur_id','=','produits.vendeur_id')
             ->where([['imageproduits.profile',1],['paiement_vendeurs.response',1]])
             ->whereNotIn('produits.vendeur_id',\DB::table('signals')->where([['client_id',$client->id],['signals.vendeur_id','<>',null]])->pluck('signals.vendeur_id')->toArray())
            ->whereNotIn('produits.id',\DB::table('signals')->where([['client_id',$client->id],['signals.produit_id','<>',null]])->pluck('signals.produit_id')->toArray())
             ->select('vendeurs.Nom','vendeurs.Nom_boutique','vendeurs.Addresse', 'vendeurs.Prenom', 'produits.*','imageproduits.image')
             ->take(24)->get();       
            $imageproduit = \DB::table('imageproduits')->get();
            $color = \DB::table('colors')->join('color_produits', 'colors.id', '=', 'color_produits.color_id')->get();
            $taille = \DB::table('taille_produits')->get();
            $typeLivraison = \DB::table('typechoisirvendeurs')->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$client->id],['id',$client->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
          
            return ['produit'=>$produit, 'ImageP' => $imageproduit, 'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille ,'command' => $command,'Fav' => $favori,'prixTotale' => $prixTotale];
        }
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }
        $fav=array(); 
        $command = array();
         $produit = \DB::table('produits')
         ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
         ->join('paiement_vendeurs','paiement_vendeurs.vendeur_id','=','produits.vendeur_id')
         ->select('vendeurs.Nom', 'vendeurs.Prenom', 'produits.*')
         ->where('paiement_vendeurs.response',1)
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
        $prd = 0; $anc = 0;
        $sousCatego = \DB::table('sous_categories')->get();
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();  
        $annonce = \DB::table('annonce_emploies')->where('sous_categorie_id',1)->get();
        $produit = \DB::table('produits')->where('sous_categorie_id',1)->get();

        
        $sousC = \DB::table('sous_categories')->where([['categorie_id',1],['libelle','<>','Autre']])->get();
   
        foreach ($sousC as $key) {
            $produitSousC = \DB::table('produits')->where('sous_categorie_id',$key->id)->get();
            $annonceSousC =  \DB::table('annonce_emploies')->where('sous_categorie_id',$key->id)->get();
            if(count($produitSousC) != 0){
                $prd++;

            }
            if(count($annonceSousC) != 0){
                $anc++;
            }
        }
       
        if(count($annonce) != 0 && count($produit) != 0){
             return ['categorie'=>$categorie , 'sousCatego'=> $sousCatego,'categorieE'=>$categorieE,'annonce1Var'=>1,'produit1Var'=>1];
        }
        if(count($produit) != 0 && count($annonce) == 0 && $anc == 0){
             return ['categorie'=>$categorie , 'sousCatego'=> $sousCatego,'categorieE'=>$categorieE,'produit1Var'=>1,'annonce1Var'=>0];
        }
        if(count($produit) == 0 && count($annonce) != 0 && $prd == 0){
             return ['categorie'=>$categorie , 'sousCatego'=> $sousCatego,'categorieE'=>$categorieE,'produit1Var'=>0,'annonce1Var'=>1];
        }
        if(count($produit) != 0 && $anc != 0){
             return ['categorie'=>$categorie , 'sousCatego'=> $sousCatego,'categorieE'=>$categorieE,'produit1Var'=>1,'annonce1Var'=>1];
        }
        if(count($annonce) != 0 && $prd != 0){
             return ['categorie'=>$categorie , 'sousCatego'=> $sousCatego,'categorieE'=>$categorieE,'produit1Var'=>1,'annonce1Var'=>1];
        }
        if($prd != 0 && $anc != 0){
            return ['categorie'=>$categorie , 'sousCatego'=> $sousCatego,'categorieE'=>$categorieE,'produit1Var'=>1,'annonce1Var'=>1];
        }
        if($prd != 0 && $anc == 0 && count($annonce) == 0){
            return ['categorie'=>$categorie , 'sousCatego'=> $sousCatego,'categorieE'=>$categorieE,'produit1Var'=>1,'annonce1Var'=>0];
        }
        if($prd == 0 && $anc != 0 && count($produit) == 0){
            return ['categorie'=>$categorie , 'sousCatego'=> $sousCatego,'categorieE'=>$categorieE,'produit1Var'=>0,'annonce1Var'=>1];
        }
        if($prd == 0 && $anc == 0 && count($produit) == 0 && count($annonce) == 0){
            return ['categorie'=>$categorie , 'sousCatego'=> $sousCatego,'categorieE'=>$categorieE,'produit1Var'=>0,'annonce1Var'=>0];
        }
    }

     public function emploi()
    {
        \DB::table('paiement_employeurs')
        ->where('paiment_par','a')
        ->whereDay('updated_at', '<', Carbon::now()->format('d') )->delete();
        \DB::table('paiement_employeurs')
        ->where('paiment_par','m')
        ->whereMonth('updated_at', '<', Carbon::now()->format('m') )->delete();
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $c = Client::find(Auth::user()->id);
            $favoris = \DB::table('produits')->get();
            $imageproduit = \DB::table('imageproduits')->get();
            $command = \DB::table('commandes')->where([['commande_envoyee',0]])->get();     

            $emploi = \DB::table('annonce_emploies')
            ->join('paiement_employeurs','paiement_employeurs.employeur_id', '=', 'annonce_emploies.employeur_id')
            ->distinct('paiement_employeurs.id')
            ->select('annonce_emploies.*')
            ->where('response',1)
            ->whereNotIn('annonce_emploies.employeur_id',\DB::table('signals')->where([['client_id',$c->id],['signals.employeur_id','<>',null]])->pluck('signals.employeur_id')->toArray())
            ->whereNotIn('annonce_emploies.id',\DB::table('signals')->where([['client_id',$c->id],['signals.annonce_emploi_id','<>',null]])->pluck('signals.annonce_emploi_id')->toArray())
            ->orderBy('annonce_emploies.created_at','desc')->paginate(21) ;

            $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
            $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
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
        $emploi = \DB::table('annonce_emploies')
        ->join('paiement_employeurs','paiement_employeurs.employeur_id', '=', 'annonce_emploies.employeur_id')
        ->distinct('paiement_employeurs.id')
        ->where('response',1)
        ->select('annonce_emploies.*')
        ->orderBy('annonce_emploies.created_at','desc')->paginate(21) ;
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
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
            ->paginate(5) ;
           $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
            $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
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
        ->paginate(5) ;
       $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
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
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
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
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
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
            \DB::table('commandes')->where([['produit_id',$request->produit_id],['client_id',$client->id],['id',$client->nbr_cmd],['taille',$request->taille],['qte',$request->qte],['type_livraison',$request->typeL],['couleur_id',$request->couleur]])->
            update(['couleur_id'=> $request->val]);
        }
        else if($request->type == 'taille'){
            \DB::table('commandes')->where([['produit_id',$request->produit_id],['client_id',$client->id],['id',$client->nbr_cmd],['couleur_id',$request->couleur],['qte',$request->qte],['type_livraison',$request->typeL],['taille',$request->taille]])->
            update(['taille'=> $request->val]);
        }
        else if($request->type == 'typeL'){
            \DB::table('commandes')->where([['produit_id',$request->produit_id],['client_id',$client->id],['id',$client->nbr_cmd],['couleur_id',$request->couleur],['qte',$request->qte],['taille',$request->taille],['type_livraison',$request->typeL]])->
            update(['type_livraison'=> $request->val]);
        }
        else if($request->type == 'qte'){
            \DB::table('commandes')->where([['produit_id',$request->produit_id],['client_id',$client->id],['id',$client->nbr_cmd],['couleur_id',$request->couleur],['type_livraison',$request->typeL],['taille',$request->taille],['qte',$request->qte]])->
            update(['qte'=> $request->val]);
        }
        return Response()->json(['etat' => true]);
    }

   
    /*****************************VisiteurSearch***********************/

    public function getsearchVisiteur(Request $request)
    {

        $search = $request->get('search');
        $favori  =\DB::table('produits')
        ->join('paiement_vendeurs','paiement_vendeurs.vendeur_id', '=', 'produits.vendeur_id')

        ->where([['Libellé', 'like', '%'.$search.'%'],['response',1]])
        ->orWhere('description', 'like', '%'.$search.'%')
        ->get();
      

         $imageproduit = \DB::table('imageproduits')->get();
        $color = \DB::table('colors')->join('color_produits', 'colors.id', '=', 'color_produits.color_id')->get();
        $AllColors = \DB::table('colors')->get();
        $taille = \DB::table('taille_produits')->get();
        $typeLivraison = \DB::table('typechoisirvendeurs')->get();

        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();

        $article  =\DB::table('articles')
        ->join('admins', 'admins.id', '=', 'articles.admin_id')
        ->where('titre', 'like', '%'.$search.'%')
        ->orWhere('description', 'like', '%'.$search.'%')
        ->select('admins.nom','admins.prenom','articles.*',\DB::raw('DATE(articles.created_at) as date'))
        ->get();

        $emploi  =\DB::table('annonce_emploies')
        ->join('employeurs','employeurs.id','=','annonce_emploies.employeur_id')
        ->join('paiement_employeurs','paiement_employeurs.employeur_id', '=', 'annonce_emploies.employeur_id')
        ->where([['libellé', 'like', '%'.$search.'%'],['response',1]])
        ->select('annonce_emploies.*','employeurs.nom','employeurs.prenom','employeurs.address','employeurs.nom_societe')
        ->get();
         $produit = \DB::table('produits')
         ->join('vendeurs','vendeurs.id','=','produits.vendeur_id')
        ->join('paiement_vendeurs','paiement_vendeurs.vendeur_id', '=', 'produits.vendeur_id')
        ->where([['Libellé', 'like', '%'.$search.'%'],['response',1]])
        ->select('produits.*','vendeurs.Nom','vendeurs.Prenom','vendeurs.Nom_boutique','vendeurs.Addresse')
        ->get();
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $client =  Client::find(Auth::user()->id);
            $command = \DB::table('commandes')->where([ ['client_id',$client->id],['id',$client->nbr_cmd]])->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$client->id],['id',$client->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
           $fav = \DB::table('favoris')->where('client_id',$client->id)->get();
            return view('searchvisiteur',['produit'=>$produit, 'ImageP' => $imageproduit, 'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille ,'categorie'=>$categorie,'categorieE'=>$categorieE,'fav' => $fav,'command' => $command,'Fav' => $favori,'prixTotale' => $prixTotale,'emploi'=>$emploi,'article'=>$article, 'search' => $search, 'client' => $client]);
        }
        $client['nom'] = "";
        $client['prenom'] = "";
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }

        $fav=array(); 
        $command = array();
    return view('searchvisiteur',['produit'=>$produit, 'ImageP' => $imageproduit, 'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille ,'categorie'=>$categorie,'categorieE'=>$categorieE,'fav' => $fav,'command' => $command,'Fav' => $favori,'prixTotale' => $prixTotale,'emploi'=>$emploi,'article'=>$article, 'search' => $search, 'client' => $client]);



    }

    public function getArticleSearch(Request $request)
    {
        $search = $request->get('search');
        $article  =\DB::table('articles')
        ->join('admins', 'admins.id', '=', 'articles.admin_id')
        ->where('titre', 'like', '%'.$search.'%')
        ->orWhere('description', 'like', '%'.$search.'%')
        ->select('admins.nom','admins.prenom','articles.*',\DB::raw('DATE(articles.created_at) as date'))
        ->paginate(5);
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $c = Client::find(Auth::user()->id);
            $favoris = \DB::table('produits')->get();
            $imageproduit = \DB::table('imageproduits')->get();
            $command = \DB::table('commandes')->where([ ['client_id',$c->id],['commande_envoyee',0]])->get();     

           $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
            $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
            $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
            if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
            }
            return view('article',['allArticle' =>$article,'categorie'=>$categorie ,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale]);
        }
        $c = array();
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = array();     
       $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $prixTotale = \DB::table('commandes')->where('client_id',0)->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
            $prixTotale[0]->prixTo = 0.00;
        }
        return view('article',['allArticle' =>$article,'categorie'=>$categorie ,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale]);
    }
 

    public function desactivate()
    {
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        return view('compte_desactive',['categorie'=>$categorie ,'categorieE'=>$categorieE]);
    }
}
