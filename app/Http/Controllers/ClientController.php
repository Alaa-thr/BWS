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
use App\Imageproduit;
use App\ColorProduit;
use App\TailleProduit;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CommandeRequest;
 
 
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
                                    'taille' =>['required'],
                                    'couleur_id' =>['required'],
                                    'type_livraison' =>['required'],
                                    'qte' =>['required'],
                            ]);
                            
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
                            
                            return Response()->json(['etat' => true,'produitExister' => false]);
                            }
                            else{
                                return Response()->json(['etat' => true,'produitExister' => true]);
                            }
                        }

                        else if($request->tailExst == 0){
                            $request->validate([
                                'couleur_id' =>['required'],
                                'type_livraison' =>['required'],
                                'qte' =>['required'],
                                 ]);
                            
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

                               
                                $commande->save();
                        
                            return Response()->json(['etat' => true,'produitExister' => false]);
                            }
                            else{
                                return Response()->json(['etat' => true,'produitExister' => true]);
                            }   
                        }
                }           
                else{
                     return Response()->json(['etat' => false, 'cnncte' => true]);
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
        ->select('colors.nom', 'imageproduits.produit_id', 'imageproduits.image', 'imageproduits.profile', 'clients.email', 'clients.codePostal', 'clients.numeroTelephone', 'clients.ville', 'produits.Libellé', 'produits.prix', 'produits.vendeur_id', 'commandes.*', 'vendeurs.Nom as nom_vendeur', 'vendeurs.Prenom as prenom_vendeur')
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
        return view('panier_visiteur',['produitCmds' => $produitCmds,'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille,'nomClient' => $clientCnncte->nom,'prenomClient' => $clientCnncte->prenom,'idClient' => $clientCnncte->id,'categorie'=>$categorie,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command]);

    } 

    public function AjoutAuFavoris($id){
        $clientCnncte = Client::find(Auth::user()->id);// njibo l client di ra connecter
        $favoris = new Favori;
        $favoris->produit_id = $id;//$id howa l id ta3 produit
        $favoris->client_id = $clientCnncte->id;
        $favoris->save();
        return $favoris;
    }
 
      
    public function EnvoyerCommande(Request $request){
        if($request->code_postale == null && $request->address == null){
             $request->validate([
              'numero_tlf' => ['required', 'string', 'max:10', 'min:10','regex:/0[5-7]+/'],
              'email' => ['required', 'string','email'],

             ]);
        }
        else if($request->code_postale != null && $request->address == null){
             $request->validate([
              'numero_tlf' => ['required', 'string', 'max:10', 'min:10','regex:/0[5-7]+/'],
              'email' => ['required', 'string','email'],
              'code_postale' => ['required', 'string', 'max:5', 'min:5','regex:/[0-9]{5}+/'],
             ]);
        }
        else if($request->code_postale == null && $request->address != null){
             $request->validate([
              'numero_tlf' => ['required', 'string', 'max:10', 'min:10','regex:/0[5-7]+/'],
              'email' => ['required', 'string','email'],
              'address' => ['required', 'string'],
             ]);
        }
        else if($request->code_postale != null && $request->address != null){
             $request->validate([
              'numero_tlf' => ['required', 'string', 'max:10', 'min:10','regex:/0[5-7]+/'],
              'email' => ['required', 'string','email'],
              'address' => ['required', 'string'],
              'code_postale' => ['required', 'string', 'max:5', 'min:5','regex:/[0-9]{5}+/'],
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

}