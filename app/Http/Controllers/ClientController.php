<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\Commande;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Rules\ModifieTextDescriptionArticle;
use App\User;
use Auth;
use App\Favori;
use App\Historique;
use App\Vendeur;
use App\Produit;
use App\Demande_emploie;
use App\Imageproduit;
use App\ColorProduit;
use App\TailleProduit;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CommandeRequest;
use App\Rules\Taille; 
 
class ClientController extends Controller
{
    

     public function profil_clinet(){
        $client=Client::find(Auth::user()->id);
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get(); 
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = \DB::table('commandes')->where([ ['client_id',$client->id],['commande_envoyee',0]])->get();     
        return view('profil_clinet',['client'=>$client,'categorie'=>$categorie,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command]);
    }    
    public function update_profil(Request $request, $id) {
                

        $client = Client::find(Auth::user()->id);
        $user = User::find(Auth::user()->id);
        

        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->numeroTelephone = $request->input('num_telephone');
        $client->email = $request->input('adresse_email');
        $client->codePostal = $request->input('code_postal'); 
        $client->ville = $request->input('v');

        $user->numTelephone = $request->input('num_telephone');
        $user->email = $request->input('adresse_email');  
        
        $client->save();
        $user->save();

        return redirect('profilClient');
    }
    public function get_commande_client(){
        $c = Client::find(Auth::user()->id);
        $article = \DB::table('commandes')
        ->where([['client_id', $c->id],['commande_envoyee',1],['CmdClientDelete',0]])
        ->select('id')
        ->distinct('id')
        ->paginate(5) ;

        $cmd =\DB::table('commandes')->get() ;     
        

        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = \DB::table('commandes')->where([ ['client_id',$c->id],['commande_envoyee',0]])->get();     
        
        return view('commande_client',['article'=>$article, 'idAdmin' => $c->id,'categorie'=>$categorie,'categorieE'=>$categorieE, 'cmd' =>$cmd,'client' =>$c,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command]);
    } 
    public function detaillsCommande(Request $request){
        $clientCnncte = Client::find(Auth::user()->id);
        $commande_detaills = \DB::table('commandes')
        ->join('produits', 'produits.id', '=', 'commandes.produit_id')
        ->join('clients','clients.id', '=', 'commandes.client_id')
        ->join('imageproduits','imageproduits.produit_id', '=', 'commandes.produit_id')
        ->join('colors','colors.id', '=', 'commandes.couleur_id')
        ->join('vendeurs','vendeurs.id', '=', 'commandes.vendeur_id')
        ->select('colors.nom', 'imageproduits.produit_id', 'imageproduits.image', 'imageproduits.profile', 'commandes.email','commandes.address', 'commandes.code_postale', 'commandes.numero_tlf', 'clients.ville', 'produits.Libellé', 'produits.prix', 'produits.vendeur_id', 'commandes.*', 'vendeurs.Nom as nom_vendeur', 'vendeurs.Prenom as prenom_vendeur')
        ->where([['commandes.client_id', $clientCnncte->id],['commandes.id', $request->idA],['imageproduits.profile',1]])
        ->get();
        return  $commande_detaills;
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
                                $commande->prix_total = $request->prix;
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
                                        $commande->prix_total = $request->prix;
                                        $commande->qte = $request->prix;
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
                return Response()->json(['etat' => false,'cnncte' => false]);
            }   
                        
        }           
                
        
        
    }
    public function ProduitCommande(){
        $clientCnncte = Client::find(Auth::user()->id);
        $produitCmds = \DB::table('commandes')
        ->join('produits', 'produits.id', '=', 'commandes.produit_id')
        ->join('clients','clients.id', '=', 'commandes.client_id')
        ->join('imageproduits','imageproduits.produit_id', '=', 'commandes.produit_id')
        ->join('colors','colors.id', '=', 'commandes.couleur_id')
        ->join('vendeurs','vendeurs.id', '=', 'commandes.vendeur_id')
        ->select('colors.nom', 'imageproduits.produit_id', 'imageproduits.image', 'imageproduits.profile','clients.ville', 'produits.Libellé', 'produits.prix', 'produits.vendeur_id', 'commandes.*', 'vendeurs.Nom as nom_vendeur', 'vendeurs.Prenom as prenom_vendeur',DB::raw('(commandes.prix_total * commandes.qte) as prixTo'))
        ->where([['commandes.client_id', $clientCnncte->id],['commandes.id', $clientCnncte->nbr_cmd],['imageproduits.profile',1]])
        ->get();

        

        $color = \DB::table('colors')->join('color_produits', 'colors.id', '=', 'color_produits.color_id')->get();
        $taille = \DB::table('taille_produits')->get();
        $typeLivraison = \DB::table('typechoisirvendeurs')->get();

        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();

        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = \DB::table('commandes')->where([ ['client_id',$clientCnncte->id],['commande_envoyee',0]])->get();     
        return view('panier_visiteur',['produitCmds' => $produitCmds,'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille,'client' => $clientCnncte,'idClient' => $clientCnncte->id,'categorie'=>$categorie,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command]);


    } 

    public function panierDemmande(){
        $clientCnncte = Client::find(Auth::user()->id);
        $produitCmds = \DB::table('commandes')
        ->join('produits', 'produits.id', '=', 'commandes.produit_id')
        ->join('clients','clients.id', '=', 'commandes.client_id')
        ->join('imageproduits','imageproduits.produit_id', '=', 'commandes.produit_id')
        ->join('colors','colors.id', '=', 'commandes.couleur_id')
        ->join('vendeurs','vendeurs.id', '=', 'commandes.vendeur_id')
        ->select('colors.nom', 'imageproduits.produit_id', 'imageproduits.image', 'imageproduits.profile','clients.ville', 'produits.Libellé', 'produits.prix', 'produits.vendeur_id', 'commandes.*', 'vendeurs.Nom as nom_vendeur', 'vendeurs.Prenom as prenom_vendeur',DB::raw('(commandes.prix_total * commandes.qte) as prixTo'))
        ->where([['commandes.client_id', $clientCnncte->id],['commandes.id', $clientCnncte->nbr_cmd],['imageproduits.profile',1]])
        ->get();
        $prixT = \DB::table('commandes')
        ->join('clients','clients.id', '=', 'commandes.client_id')
        ->select(DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))
        ->where([['commandes.client_id', $clientCnncte->id],['commandes.id', $clientCnncte->nbr_cmd]])
        ->get();
        if($prixT[0]->prixTo == null){
            $prixT[0]->prixTo  = "0.00";
        }

        return  ['produitCmds' => $produitCmds, 'prixT' => $prixT];
    } 


    public function AjoutAuFavoris($id){

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
 
      
    public function EnvoyerCommande(Request $request){

        if($request->nonCode == 1 && $request->nonAddresse == 1 ){
             $request->validate([
              'numero_tlf' => ['required', 'string', 'max:10', 'min:10','regex:/^0[5-7]+/'],
              'email' => ['required', 'string','email'],
              'address' => ['required', 'string'],
              'code_postale' => ['required', 'string', 'max:5', 'min:5','regex:/[0-9]{5}+/'],

             ]);
        }
        else if($request->nonCode != 1 && $request->nonAddresse == 1){
             $request->validate([
              'numero_tlf' => ['required', 'string', 'max:10', 'min:10','regex:/^0[5-7]+/'],
              'email' => ['required', 'string','email'],
              'address' => ['required', 'string'],
             ]);
        }
        else if($request->nonCode == 1 && $request->nonAddresse != 1){
             $request->validate([
              'numero_tlf' => ['required', 'string', 'max:10', 'min:10','regex:/^0[5-7]+/'],
              'email' => ['required', 'string','email'],
              'code_postale' => ['required', 'string', 'max:5', 'min:5','regex:/[0-9]{5}+/'],
             ]);
        }
        else if($request->nonCode != 1 && $request->nonAddresse != 1){
             $request->validate([
              'numero_tlf' => ['required', 'string', 'max:10', 'min:10','regex:/^0[5-7]+/'],
              'email' => ['required', 'string','email'],
              
             ]);
        }
        $clientCnncte = Client::find(Auth::user()->id);// njibo l client di ra connecter
       
        $commandes = \DB::table('commandes')->get();
       
        foreach($commandes as $cmd){
            \DB::table('commandes')->where([ ['client_id',$clientCnncte->id],['id','=',$clientCnncte->nbr_cmd]])->
            update(['email'=> $request->email ,
            'numero_tlf' => $request->numero_tlf, 'code_postale' => $request->code_postale, 'commande_envoyee' =>1,
             'ville' =>$clientCnncte->ville,'address' =>$request->address]);}


        $clientCnncte->nbr_cmd =$clientCnncte->nbr_cmd+1;
        $clientCnncte->addresse = $request->address;
        $clientCnncte->codePostal  = $request->code_postale;
        $clientCnncte->save();

        session()->flash('success','Cette Commande sera traitée par le vendeur et lui rappeler ou refuser ton commande avec notification');

        return Response()->json(['etat' => true,'commandeAjout' => $commandes]);
    }

    public function getProduit(){
        $clientCnncte = Client::find(Auth::user()->id);
        $favoris = \DB::table('produits')->get();
        $annonce  =\DB::table('annonce_emploies')->get();
        $produit = \DB::table('favoris')->where([ ['client_id',$clientCnncte->id]])
        ->orderBy('created_at','desc')->paginate(8); 
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        
        $command = \DB::table('commandes')->where([ ['client_id',$clientCnncte->id],['commande_envoyee',0]])->get(); 
       
        
        return view('favoris_client',['produit'=>$produit, 'ImageP' => $imageproduit, 'Fav' => $favoris,'annonce'=>$annonce,'command' => $command,'categorie'=>$categorie,'categorieE'=>$categorieE]);
    }

    public function addHisto($id){
        $clientCnncte = Client::find(Auth::user()->id);// njibo l client di ra connecter
        $histoProd = new historique;
        $histoProd->produit_id = $id;//$id howa l id ta3 produit
        $histoProd->client_id = $clientCnncte->id;
        $histoProd->save();
        return $histoProd;
    }
    public function AnnonceAuFavoris($id){
        $clientCnncte = Client::find(Auth::user()->id);
        $annonce = new Favori;
        $annonce->annonce_emploi_id = $id;//$id howa l id ta3 annonce
        $annonce->client_id = $clientCnncte->id;
        $annonce->save();
        return $annonce;
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
             'cv' => ['required'],
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
                $demande->nom_Prenom = $client->nom.' '.$client->prenom;
                $demande->numeroTlf = $client->numeroTelephone;
                $demande->email = $client->email;
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
             return Response()->json(['etatee' => true, 'type'=> 2]);
        }
    }
}