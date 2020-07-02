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
        return view('profil_clinet',['client'=>$client]);
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
    public function get_commande_client(){//fcnt qui retourné tout les articles qui sont dans la table "Article" et trie par ordre desc selon son dates de creations
        $c = Client::find(Auth::user()->id);//recuperé "user_id" de admin qui est connecter       
        $article = \DB::table('commandes')->where('client_id', $c->id)->orderBy('created_at','desc')->paginate(5) ;//recuperé les articles qui sont dans la table "Article" et trie par ordre desc selon son dates de creations et pour "->paginate(5)" c a d f kol page t'affichilek 5 ta3 les article  
        return view('commande_client',['article'=>$article, 'idAdmin' => $c->id]);//reteurné a la view "articles_admin" et les 2 attributs "article" (contient tout les articles) et "idAdmin" (id de l'admin cncté) 
    } 
    public function detaillsCommande(Request $request){//fcnt retourné l'article di rena habin n2affichiw les détaills te3o, 3anda un parametre di fih id ta3 article rechercher
        $commande_detaills = \DB::table('commandes')->where('id', $request->idA)->get();
        return  $commande_detaills;
    }

    public function deleteCommande($id){//fnct pour supprimer un article di 3ando un parametre di hoda id ta3 article di nssuprimiwah w tretourni un attributs "etat"(ida kan = true => la supprision n3amlt ghaya)
        $commande = Commande::find($id);//n7awes 3la l article di rena habin nsupprimiwah
        $commande->delete();
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

        //$produitCmds = \DB::table('commandes')->get();
        return view('panier_visiteur',['produitCmds' => $produitCmds,'color' => $color, 'typeLivraison' => $typeLivraison, 'taille' => $taille,'nomClient' => $clientCnncte->nom,'prenomClient' => $clientCnncte->prenom,'idClient' => $clientCnncte->id]);

    } 

    public function AjoutAuFavoris($id){
        $clientCnncte = Client::find(Auth::user()->id);// njibo l client di ra connecter
        $favoris = new Favori;
        $favoris->produit_id = $id;//$id howa l id ta3 produit
        $favoris->client_id = $clientCnncte->id;
        $favoris->save();
        return $favoris;
    }
 
      
    public function EnvoyerCommande(CommandeRequest $request){
        $clientCnncte = Client::find(Auth::user()->id);// njibo l client di ra connecter
       
        $commandes = \DB::table('commandes')->get();
       
        foreach($commandes as $cmd){
            \DB::table('commandes')->where([ ['client_id',$clientCnncte->id],['id','=',$clientCnncte->nbr_cmd]])->
            update(['email'=> $request->email ,
            'numero_tlf' => $request->numero_tlf, 'code_postale' => $request->code_postale, 'commande_envoyee' =>1,
             'ville' =>$clientCnncte->ville]);}


        $clientCnncte->nbr_cmd =$clientCnncte->nbr_cmd+1; 
        $clientCnncte->save();

        session()->flash('success','Cette Commande sera traitée par le vendeur et lui rappeler ou refuser ton commande avec notification');

        return Response()->json(['etat' => true,'commandeAjout' => $commandes]);
}

public function getProduit(){
    $clientCnncte = Client::find(Auth::user()->id);
    $favoris = \DB::table('produits')->get();

    $produit = \DB::table('favoris')->where([ ['client_id',$clientCnncte->id]])
    ->orderBy('created_at','desc')->paginate(8); 

    $imageproduit = \DB::table('imageproduits')->get();
    return view('favoris_client',['produit'=>$produit, 'ImageP' => $imageproduit, 'Fav' => $favoris]);
}



}