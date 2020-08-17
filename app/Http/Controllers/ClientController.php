<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\Commande;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Rules\ModifieTextDescriptionArticle;
use App\Rules\checkPassword;
use App\User;
use Auth;
use App\Favori;
use App\Ville;
use App\Signal;
use App\Notificatione;
use App\Historique;
use App\Vendeur;
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
use App\Rules\NumberExist;
use App\Rules\EmailExist;
use App\Rules\NumCarteBancaireExist;


class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('logout.user');
        $this->middleware('login.client')->only(['changePassword','profil_clinet','update_profil','get_commande_client','detaillsCommande','deleteCommande','ProduitCommande','panierDemmande','EnvoyerCommande','getProduit','addHisto','SignalerProduit','SignalerVendeur','SignalerAnnonce','SignalerEmployeur']);
    }
    public function changePassword(Request $request){
       $request->validate([
            'NewPassword' => 'required|string|min:8',
            'PasswordCurrent' => ['required',new checkPassword(null)],
            'ConfirmPassword'      => ['required','string','min:8',new checkPassword($request->NewPassword)]
        ]);
       \DB::table('users')->where('id',Auth::user()->id)->update(['password' => Hash::make($request->NewPassword)]);
    }

     public function profil_clinet(){
        if(!Auth::check()){
            return view('page_not_found',['categorie'=>\DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get() ,'categorieE'=>\DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get()]);
            
        }
        $ville = Ville::all();
        $client=Client::find(Auth::user()->id);
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get(); 
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = \DB::table('commandes')->where([ ['client_id',$client->id],['commande_envoyee',0]])->get();     
        $prixTotale= \DB::table('commandes')->where([ ['client_id',$client->id],['id',$client->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
        }
       
        return view('profil_clinet',['client'=>$client,'categorie'=>$categorie,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale,'ville' => $ville]);
    }    
    public function update_profil(Request $request) {
                
        $request->validate([
             'numeroTelephone' =>  ['required', 'string','regex:/^0[5-7][0-9]+/',"min:10","max:10", new NumberExist(1,$request->id)],
             'email' =>['required', 'string', 'email', 'max:40', new EmailExist(1,$request->id)],
             'nom' =>['required','regex:/[-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
             'prenom' =>['required','regex:/[-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
             'codePostal' =>['nullable','regex:/[0-9]+/', new NumCarteBancaireExist(1,$request->id)],
             'ville' =>['required'],
             'addresse' =>[ 'nullable','string','regex:/[-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
         ]);

        $client = Client::find($request->user_id);
        $user = User::find($request->user_id);

        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->numeroTelephone = $request->numeroTelephone;
        $client->email = $request->email;
        $client->codePostal = $request->codePostal; 
        $client->ville = $request->ville;
        $client->addresse = $request->addresse;

        $user->numTelephone = $request->numeroTelephone;
        $user->email = $request->email;  
        
        $client->save();
        $user->save();

        return redirect('profilClient');
    }
    public function get_commande_client(){
        if(!Auth::check()){
            return view('page_not_found',['categorie'=>\DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get() ,'categorieE'=>\DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get()]);
            
        }
        $c = Client::find(Auth::user()->id);
        $article = \DB::table('commandes')
        ->where([['client_id', $c->id],['commande_envoyee',1],['CmdClientDelete',0]])
        ->select('id','client_id')
        ->distinct('id')
        ->paginate(5) ;
           
        $cmd =\DB::table('commandes')
        ->select('commandes.*',\DB::raw('DATE(commandes.created_at) as date'))
        ->get() ;     
        
        $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
        }
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = \DB::table('commandes')->where([ ['client_id',$c->id],['commande_envoyee',0]])->get();     
        
        return view('commande_client',['article'=>$article, 'idAdmin' => $c->id,'categorie'=>$categorie,'categorieE'=>$categorieE, 'cmd' =>$cmd,'client' =>$c,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale]);
    } 
    public function detaillsCommande(Request $request){
        $clientCnncte = Client::find(Auth::user()->id);
        $commande_detaills = \DB::table('commandes')
        ->join('produits', 'produits.id', '=', 'commandes.produit_id')
        ->join('clients','clients.id', '=', 'commandes.client_id')
        ->join('imageproduits','imageproduits.produit_id', '=', 'commandes.produit_id')
        ->join('colors','colors.id', '=', 'commandes.couleur_id')
        ->join('vendeurs','vendeurs.id', '=', 'commandes.vendeur_id')
        ->distinct('produits.id')
        ->select('colors.nom', 'imageproduits.produit_id', 'imageproduits.image', 'imageproduits.profile', 'commandes.email','commandes.address', 'commandes.code_postale', 'commandes.numero_tlf', 'clients.ville', 'produits.Libellé', 'produits.prix', 'produits.vendeur_id', 'commandes.*', 'vendeurs.Nom as nom_vendeur', 'vendeurs.Prenom as prenom_vendeur')
        ->where([['commandes.client_id', $clientCnncte->id],['commandes.id', $request->idA],['imageproduits.profile',1]])
        ->get();

        $type = \DB::table('tarif_livraisons')
        ->join('villes', 'villes.id', '=', 'tarif_livraisons.ville_id')
        ->where('nom',$commande_detaills[0]->ville)
        ->select('nom','prix','vendeur_id')
        ->get();
       
        return  ['cmd'=>$commande_detaills,'type_prix'=>$type];
    }

    public function deleteCommande($id){
        $client = Client::find(Auth::user()->id);
        \DB::table('commandes')->where([['id',$id],['client_id',$client->id]])->update(['CmdClientDelete' => 1]);

        
        return Response()->json(['etat' => true]);
    }

     public function addPanier(Request $request){
        if(auth()->guest()){
            return Response()->json(['etat' => false,'cnncte' => false]);
        }
        else{
            if(Auth::user()->type_compte == "c"){
                $clientCnncte = Client::find(Auth::user()->id);// njibo l client di ra connecter
                $histoProd = new historique;
                $histoProd->produit_id =$request->produit_id;
                $histoProd->client_id = $clientCnncte->id;
                $histoProd->save();
                $client =  Client::find(Auth::user()->id);
                $produitExister = \DB::table('commandes')->where([['id', $client->nbr_cmd],['produit_id',$request->produit_id],['client_id',$client->id]])->get();
                        if($request->tailExst == 1){
                            $request->validate([
                                    'taille' =>['required',new Taille()],
                                    'couleur_id' =>['required'],
                                    'type_livraison' =>['required'],
                                    'qte' =>['required'],
                            ]);
                        } 
                        else if($request->tailExst == 0){
                            $request->validate([
                                'couleur_id' =>['required'],
                                'type_livraison' =>['required'],
                                'qte' =>['required'],
                                 ]);
                        }   
                        if(count($produitExister) == 0){
                                $commande = new Commande();         
                                $commande->id = $client->nbr_cmd;
                                $commande->client_id = $client->id;
                                $commande->vendeur_id = $request->vendeur_id;
                                $commande->produit_id = $request->produit_id; 
                                $commande->prix_produit = $request->prix;
                                $commande->qte = $request->qte;
                                $commande->type_livraison = $request->type_livraison;
                                $commande->couleur_id = $request->couleur_id;
                                $commande->taille = $request->taille;
                                $commande->save();
                                $cmd=\DB::table('produits')->where('id',$request->produit_id)->get();
                                $image =\DB::table('imageproduits')->where('produit_id',$request->produit_id)->get();
                                $prixTotale= $request->prix * $request->qte;
                            return Response()->json(['cmd'=>$cmd,'prixTotale'=>$prixTotale,'image'=>$image,'commande'=>$commande,'etat' => true,'produitExister' => false]);
                        }
                        else if(count($produitExister) != 0){
                            foreach ($produitExister as $key ) {
                                if($key->taille != $request->taille || $key->qte != $request->qte || $key->type_livraison != $request->type_livraison || $key->couleur_id != $request->couleur_id ){
                                        $commande = new Commande();         
                                        $commande->id = $client->nbr_cmd;
                                        $commande->client_id = $client->id;
                                        $commande->vendeur_id = $request->vendeur_id;
                                        $commande->produit_id = $request->produit_id; 
                                        $commande->prix_produit = $request->prix;
                                        $commande->qte = $request->qte;
                                        $commande->type_livraison = $request->type_livraison;
                                        $commande->couleur_id = $request->couleur_id;
                                        $commande->taille = $request->taille;
                                        $commande->save();
                                        $cmd=\DB::table('produits')->where('id',$request->produit_id)->get();
                                        $image =\DB::table('imageproduits')->where('produit_id',$request->produit_id)->get();
                                        $prixTotale= $request->prix * $request->qte;
                                        return Response()->json(['cmd'=>$cmd,'prixTotale'=>$prixTotale,'image'=>$image,'commande'=>$commande,'etat' => true,'produitExister' => false]);
                                }
                                if($key->taille == $request->taille && $key->qte == $request->qte && $key->type_livraison == $request->type_livraison && $key->couleur_id == $request->couleur_id && $key->id == $client->nbr_cmd && $key->produit_id == $request->produit_id && $key->client_id == $client->id ){
                                    return Response()->json(['etat' => true,'produitExister' => true]);
                                }
                            }
                        }
            }
            else{//est cncte mais ps client
                return Response()->json(['etat' => false,'cnncte' => true]);
            }   
        }           

                

        
    }

    public function checkTextarea(Request $request){
        return $request->validate([
                'text' =>['required','string','min:5']
            ]);
    }
    public function getTarifCommande(Request $request){
        $clientCnncte = Client::find(Auth::user()->id);
        $tarif = \DB::table('commandes')
        ->join('tarif_livraisons','tarif_livraisons.vendeur_id', '=', 'commandes.vendeur_id')
        ->join('villes','villes.id', '=', 'tarif_livraisons.ville_id')
        ->where([['commandes.client_id', $clientCnncte->id],['commandes.id', $clientCnncte->nbr_cmd],['tarif_livraisons.ville_id',$request->id]])
        ->distinct('commandes.vendeur_id')
        ->select('tarif_livraisons.prix','tarif_livraisons.ville_id','commandes.vendeur_id','commandes.prix_produit','commandes.qte','couleur_id','taille','type_livraison','commandes.produit_id','villes.nom')
        ->get();
         $type = \DB::table('tarif_livraisons')
        ->join('villes', 'villes.id', '=', 'tarif_livraisons.ville_id')
        ->where('nom',$tarif[0]->nom)
        ->select('nom','prix','vendeur_id')
        ->get();
       
        return  ['tarif' => $tarif,'type_prix'=>$type];
       
    }

    public function ProduitCommande(){
        if(!Auth::check()){
            return view('page_not_found',['categorie'=>\DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get() ,'categorieE'=>\DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get()]);
            
        }
        $clientCnncte = Client::find(Auth::user()->id);       
        $produitCmds = \DB::table('commandes')
        ->join('produits', 'produits.id', '=', 'commandes.produit_id')        
        ->join('clients','clients.id', '=', 'commandes.client_id')
        ->join('imageproduits','imageproduits.produit_id', '=', 'commandes.produit_id')
        ->join('colors','colors.id', '=', 'commandes.couleur_id')
        ->join('vendeurs','vendeurs.id', '=', 'commandes.vendeur_id')
        ->select('colors.nom', 'imageproduits.produit_id', 'imageproduits.image', 'imageproduits.profile','clients.ville', 'produits.Libellé', 'produits.prix', 'produits.vendeur_id', 'commandes.*', 'vendeurs.Nom as nom_vendeur', 'vendeurs.Prenom as prenom_vendeur',DB::raw('(commandes.prix_produit * commandes.qte) as prixTo'))
        ->where([['commandes.client_id', $clientCnncte->id],['commandes.id', $clientCnncte->nbr_cmd],['imageproduits.profile',1]])
        ->get();
        $villes = \DB::table('villes')->get();
        

        $color = \DB::table('colors')->join('color_produits', 'colors.id', '=', 'color_produits.color_id')->get();
        $taille = \DB::table('taille_produits')->get();
        $typeLivraison = \DB::table('typechoisirvendeurs')->get();

        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();

        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = \DB::table('commandes')->where([ ['client_id',$clientCnncte->id],['commande_envoyee',0]])->get();     
        return view('panier_visiteur',['villes' => $villes,'produitCmds' => $produitCmds,'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille,'client' => $clientCnncte,'idClient' => $clientCnncte->id,'categorie'=>$categorie,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command]);


    } 

    public function panierDemmande(){
        $clientCnncte = Client::find(Auth::user()->id);
        $produitCmds = \DB::table('commandes')
        ->join('produits', 'produits.id', '=', 'commandes.produit_id')
        ->join('clients','clients.id', '=', 'commandes.client_id')
        ->join('imageproduits','imageproduits.produit_id', '=', 'commandes.produit_id')
        ->join('colors','colors.id', '=', 'commandes.couleur_id')
        ->join('vendeurs','vendeurs.id', '=', 'commandes.vendeur_id')
        ->select('colors.nom', 'imageproduits.produit_id', 'imageproduits.image', 'imageproduits.profile','clients.ville', 'produits.Libellé', 'produits.prix', 'produits.vendeur_id', 'commandes.*', 'vendeurs.Nom as nom_vendeur', 'vendeurs.Prenom as prenom_vendeur',DB::raw('(commandes.prix_produit * commandes.qte) as prixTo'))
        ->where([['commandes.client_id', $clientCnncte->id],['commandes.id', $clientCnncte->nbr_cmd],['imageproduits.profile',1]])
        ->get();
        $prixT = \DB::table('commandes')
        ->join('clients','clients.id', '=', 'commandes.client_id')
        ->select(DB::raw('sum(commandes.prix_produit * commandes.qte) as prixTo'))
        ->where([['commandes.client_id', $clientCnncte->id],['commandes.id', $clientCnncte->nbr_cmd]])
        ->get();
        if($prixT[0]->prixTo == null){
            $prixT[0]->prixTo  = "0.00";
        }
        
       
        return  ['produitCmds' => $produitCmds, 'prixT' => $prixT];
    } 


    public function AjoutAuFavoris($id){
        if(!auth()->check()){
            return ['etat' => "notConncted"];
        }
        if(Auth::user()->type_compte =='c'){
            $clientCnncte = Client::find(Auth::user()->id);// njibo l client di ra connecter
            $favexiste = \DB::table('favoris')->where([['produit_id',$id],["client_id", $clientCnncte->id]])->get();
            if(count($favexiste) == 0){
                $favoris = new Favori;
                $favoris->produit_id = $id;//$id howa l id ta3 produit
                $favoris->client_id = $clientCnncte->id;
                $favoris->save();
                return ['etat' => "add"];
            }
            else{
                $favoris = \DB::table('favoris')->where('produit_id', $id)->delete();
                return ['etat' => "remove"];
            }
        }
        else{
            return ['etat' => "notClient"];
        }
    }

    public function AjoutAuFavorisE($id){

        if(!auth()->check()){
            return ['etat' => "notConncted"];
        }
        if(Auth::user()->type_compte =='c'){
            $clientCnncte = Client::find(Auth::user()->id);// njibo l client di ra connecter
            $favexiste = \DB::table('favoris')->where([['annonce_emploi_id',$id],["client_id", $clientCnncte->id]])->get();
            if(count($favexiste) == 0){
                $favoris = new Favori;
                $favoris->annonce_emploi_id = $id;//$id howa l id ta3 produit
                $favoris->client_id = $clientCnncte->id;
                $favoris->save();
                return ['etat' => "add"];
            }
            else{
                $favoris = \DB::table('favoris')->where('annonce_emploi_id', $id)->delete();
                return ['etat' => "remove"];
            }
        }
        else{
            return ['etat' => "notClient"];
        }
    }
 
      
    public function EnvoyerCommande(Request $request){

       
       
        if($request->nonCode == 1 && $request->nonAddresse == 1 ){
            $request->validate([
             'numero_tlf' => ['required', 'string', 'max:10', 'min:10','regex:/^0[5-7]+/'],
             'email' => ['required', 'string','email'],
             'ville' => ['required', 'string'],
             'address' => ['required', 'string'],
             'code_postale' => ['required', 'string', 'max:5', 'min:5','regex:/[0-9]{5}+/'],

            ]);
       }
       else if($request->nonCode != 1 && $request->nonAddresse == 1){
            $request->code_postale = null;
            $request->validate([
             'numero_tlf' => ['required', 'string', 'max:10', 'min:10','regex:/^0[5-7]+/'],
             'email' => ['required', 'string','email'],
             'ville' => ['required', 'string'],
             'address' => ['required', 'string'],
            ]);
       }
       else if($request->nonCode == 1 && $request->nonAddresse != 1){
            $request->address = null;
            $request->validate([
             'numero_tlf' => ['required', 'string', 'max:10', 'min:10','regex:/^0[5-7]+/'],
             'email' => ['required', 'string','email'],
             'ville' => ['required', 'string'],
             'code_postale' => ['required', 'string', 'max:5', 'min:5','regex:/[0-9]{5}+/'],
            ]);
       }
       else if($request->nonCode != 1 && $request->nonAddresse != 1){
            $request->address = null;
            $request->code_postale = null;
            $request->validate([
             'numero_tlf' => ['required', 'string', 'max:10', 'min:10','regex:/^0[5-7]+/'],
             'email' => ['required', 'string','email'],
             'ville' => ['required', 'string'],
            ]);
       }
      

        $clientCnncte = Client::find(Auth::user()->id);// njibo l client di ra connecter
       
        $commandes = \DB::table('commandes')->get();
       
       
        \DB::table('commandes')->where([ ['client_id',$clientCnncte->id],['id','=',$clientCnncte->nbr_cmd]])->
        update(['email'=> $request->email ,'numero_tlf' => $request->numero_tlf, 'code_postale' => $request->code_postale, 'commande_envoyee' =>1,'ville' =>$request->ville,'address' =>$request->address,'prix_totale'=>$request->prix_totale]);
        


        $clientCnncte->nbr_cmd =$clientCnncte->nbr_cmd+1;
        $clientCnncte->addresse = $request->address;
        $clientCnncte->codePostal  = $request->code_postale;
       $clientCnncte->ville  = $request->ville;
        $clientCnncte->save();


        session()->flash('success','Cette Commande sera traitée par le vendeur et lui rappeler ou refuser ton commande avec notification');

        return Response()->json(['etat' => true,'commandeAjout' => $commandes]);
    }

    public function getProduit(){
        if(!Auth::check()){
            return view('page_not_found',['categorie'=>\DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get() ,'categorieE'=>\DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get()]);
            
        }
        $clientCnncte = Client::find(Auth::user()->id);
        $favoris = \DB::table('produits')
        ->join('favoris','favoris.produit_id','=','produits.id')
        ->join('vendeurs','vendeurs.id', '=', 'produits.vendeur_id')
        ->select('produits.*','vendeurs.Nom','vendeurs.Prenom')
        ->where([ ['favoris.client_id',$clientCnncte->id]])
        ->get();
        $annonce  =\DB::table('annonce_emploies')
        ->join('favoris','favoris.annonce_emploi_id','=','annonce_emploies.id')
        ->select('annonce_emploies.*')
        ->where([ ['favoris.client_id',$clientCnncte->id]])
        ->get();
        $produit = \DB::table('favoris')
        ->where([ ['client_id',$clientCnncte->id]])
        ->orderBy('favoris.created_at','desc')->paginate(8); 
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        
        $command = \DB::table('commandes')->where([ ['client_id',$clientCnncte->id],['commande_envoyee',0]])->get(); 
        $color = \DB::table('colors')->join('color_produits', 'colors.id', '=', 'color_produits.color_id')->get();
        $taille = \DB::table('taille_produits')->get();
        $typeLivraison = \DB::table('typechoisirvendeurs')->get();
        
        return view('favoris_client',['produit'=>$produit, 'ImageP' => $imageproduit, 'Fav' => $favoris,'annonce'=>$annonce,'command' => $command,'categorie'=>$categorie,'categorieE'=>$categorieE,'client' => $clientCnncte,'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille ,]);
    }

    public function addHisto($id){
        $clientCnncte = Client::find(Auth::user()->id);// njibo l client di ra connecter
        $histoProd = new historique;
        $histoProd->produit_id = $id;//$id howa l id ta3 produit
        $histoProd->client_id = $clientCnncte->id;
        $histoProd->save();
        return $histoProd;
    }

    public function EnvoyerDemande(Request $request){
        
        if(auth()->check() && Auth::user()->type_compte == 'c'){
            $client = Client::find(Auth::user()->id);
            $demandeExiste = \DB::table('demande_emploies')->where([['client_id',$client->id],['annonceE_id',$request->annonceE_id]])->get();
            if(count($demandeExiste) != 0){
                return Response()->json(['etat' => true, 'cncte' => true, 'demandeExiste' => true]);
            }
            $request->validate([
             'nom_Prenom' => ['required','string','max:60'],
             'tlf' => ['required','string','min:10','max:10','regex:/^0[5-7][0-9]+/'],
             'email' => ['required','email'],
             'cv' => ['required','mimes:pdf,jpeg,png,gif,text,doc,xls,ppt,text,jfif,pjpeg,pjp'],
            ]);
            $employeur = \DB::table('annonce_emploies')->where('id',$request->annonceE_id)->select('employeur_id')->get();
               $exploded = explode(',', $request->cv);
                $decoded = base64_decode($exploded[1]);
                if(str_contains($exploded[0], 'jpeg')){
                    $extension = 'jpg';
                }
                else if(str_contains($exploded[0], 'png')){
                    $extension = 'png';
                }
                else if(str_contains($exploded[0], 'pdf')){
                    $extension = 'pdf';
                }
                else if(str_contains($exploded[0], 'doc')){
                    $extension = 'doc';
                }
                else if(str_contains($exploded[0], 'xls')){
                    $extension = 'xls';
                }
                else if(str_contains($exploded[0], 'ppt')){
                    $extension = 'ppt';
                }
                else if(str_contains($exploded[0], 'text')){
                    $extension = 'txt';
                }
                else if(str_contains($exploded[0], 'txt')){
                    $extension = 'txt';
                }
                else if(str_contains($exploded[0], 'jfif')){
                    $extension = 'jfif';
                }
                else if(str_contains($exploded[0], 'pjpeg')){
                    $extension = 'pjpeg';
                }
                else if(str_contains($exploded[0], 'pjp')){
                    $extension = 'pjp';
                }
                $fileName = $client->nom.'_'.$client->prenom.$client->id.str_random(4).'.'.$extension;
                Storage::put('/public/demande_cv/' . $fileName, $decoded);
                $demande = new Demande_emploie;
                $demande->demmande_envoyer = 1;
                $demande->client_id = $client->id;
                $demande->annonceE_id = $request->annonceE_id;
                $demande->employeur_id = $employeur[0]->employeur_id;
                $demande->cv_client = $fileName;
                $demande->nom_Prenom = $request->nom_Prenom;
                $demande->numeroTlf = $request->tlf;
                $demande->email = $request->email;
                $demande->save();
               return Response()->json(['etat' => true, 'cncte' => true,'demandeExiste' => false]);
        }

    }

    public function isCnnected(){
        if(!auth()->check()){
            return Response()->json(['etatee' => false, 'type'=> 0]);
        }
        else if(auth()->check() && Auth::user()->type_compte != 'c'){
            return Response()->json(['etatee' => true, 'type'=> 1]);
        }
        else if(auth()->check() && Auth::user()->type_compte == 'c'){
             $client = $client = Client::find(Auth::user()->id);
             $client->nom= ucwords($client->nom);
             $client->prenom= ucwords($client->prenom);
             return Response()->json(['etatee' => true, 'type'=> 2, 'client'=> $client]);
        }
    }
    public function SignalerProduit($id){
    
        $clientCnncte = Client::find(Auth::user()->id);
        $produit = \DB::table('produits')->where('id',$id)->get();
        \DB::table('produits')->where('id',$id)->increment('nbr_signal');
        $signal = new Signal;
        $signal->produit_id = $id;
        $signal->client_id = $clientCnncte->id;
        $signal->save();
        return ['etat' => "remove"];
 
    }
    
    public function SignalerVendeur($id){
    
        $clientCnncte = Client::find(Auth::user()->id);
        $signal = new Signal;
        $signal->vendeur_id = $id;
        $signal->client_id = $clientCnncte->id;
        $signal->save();
        \DB::table('vendeurs')->where('id',$id)->increment('Nbre_signal');
        \DB::table('vendeurs')->where([['id',$id],['Nbre_signal','>','5']])->update(['deleted_at' =>Carbon::now()]);

        
        return ['etat' => "remove"];
    }
    
    public function SignalerAnnonce($id){
    
        $clientCnncte = Client::find(Auth::user()->id);
        $annonce = \DB::table('annonce_emploies')->where('id',$id)->get();
        \DB::table('annonce_emploies')->where('id',$id)->increment('nbr_signal');
        $signal = new Signal;
        $signal->annonce_emploi_id = $id;
        $signal->client_id = $clientCnncte->id;
        $signal->save();
        
        return ['etat' => "remove"];
    }
    
    public function SignalerEmployeur($id){
    
        $clientCnncte = Client::find(Auth::user()->id);
        $signal = new Signal;
        $signal->employeur_id = $id;
        $signal->client_id = $clientCnncte->id;
        $signal->save();
        \DB::table('employeurs')->where('id',$id)->increment('Nbre_signal');
        \DB::table('employeurs')->where([['id',$id],['Nbre_signal','>','5']])->update(['deleted_at' =>Carbon::now()]);    

        return ['etat' => "remove"];
    }
    
}
    