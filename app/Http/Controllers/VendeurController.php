<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendeur;
use App\Client;
use App\Commande;
use App\User;
use App\Produit;
use App\Imageproduit;
use App\Notification;
use App\ColorProduit;
use App\TailleProduit;
use App\Tarif_livraison;
use App\Rules\ModifieLibelleDescriptionProduit;

use Illuminate\Support\Facades\Storage;
use Auth;
use Validator;

class VendeurController extends Controller
{
     public function profil_vendeur(){
        $vendeur = Vendeur::find(Auth::user()->id);
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get(); 
        return view('profil_vendeur',['vendeur'=>$vendeur,'categorie'=>$categorie,'categorieE'=>$categorieE]);
    }
    public function update_profil(Request $request, $id) {
                

        $vendeur = Vendeur::find(Auth::user()->id);
        $user = User::find(Auth::user()->id);

        $vendeur->Nom = $request->input('nom');
        $vendeur->Prenom = $request->input('prenom');
        $vendeur->numTelephone = $request->input('num');
        $vendeur->email = $request->input('adresse_email'); 
        $vendeur->Num_Compte_Banquaire = $request->input('bnq');
        $vendeur->Nom_boutique = $request->input('boutique');

        $user->numTelephone = $request->input('num');
        $user->email = $request->input('adresse_email');  
        
        $vendeur->save();
        $user->save();
       
        return redirect('profilVendeur');
    }

    public function getProduit(){
        $vendeur = Vendeur::find(Auth::user()->id);
        $produit = \DB::table('produits')->where('vendeur_id', $vendeur->id)->orderBy('created_at','desc')->paginate(8);       
        $imageproduit = \DB::table('imageproduits')->get();
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $notification = \DB::table('notifications')->get();

        foreach($notification as $noti){
           

            
            if($noti->vendeur_id === $vendeur->id AND $noti->DeleteNotif === 0){
                session()->flash('danger','Votre Produit :  ' .$noti->nomProduit  .'  était Supprimer car il est Signaler 3 fois');
               /* $noti->DeleteNotif = 1;
                $noti->save();
               */ \DB::table('notifications')->where([['vendeur_id',$vendeur->id],['DeleteNotif',0]])->update(['DeleteNotif' => 1]);
           }
            
        }
        return view('produit_vendeur',['produit'=>$produit, 'ImageP' => $imageproduit,'categorie'=>$categorie,'categorieE'=>$categorieE]);
    }

    public function getSousCategories($CategoId){
        $sousCatego = \DB::table('sous_categories')->where('categorie_id',$CategoId)->orderBy('libelle','asc')->get();
        return $sousCatego;
    }

    public function getCategories(){
        $categorie = \DB::table('categories')->where([['id', '<>', 1],['typeCategorie','shop']])->orderBy('libelle','asc')->get();
        return $categorie;
    }
    public function getColors(){
        $color = \DB::table('colors')->orderBy('nom','asc')->get();
        return $color;
     }
    public function addProduit(Request $request){
       
            if( $request->typet == 2){
                 $request->validate([
                'Libellé' => ['required','regex:/^[A-Z0-9][a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                'description' => ['required','regex:/^[A-Z0-9][a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                'prix' =>['required'],
                'sous_categorie_id' =>['required'],
                'Qte_P' =>['required'],
                'poid' =>['required'],
                'image' =>['required'],
                'colors' =>['required'],
                'pointures' =>['required']
                 ]);
            }
             if( $request->typet == 1){               
                $request->validate([
                'Libellé' => ['required','regex:/^[A-Z0-9][a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                'description' => ['required','regex:/^[A-Z0-9][a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                'prix' =>['required'],
                'sous_categorie_id' =>['required'],
                'Qte_P' =>['required'],
                'poid' =>['required'],
                'image' =>['required'],
                'colors' =>['required'],
                'tailles' =>['required']
                ]);
            }
            else{
                $request->validate([
                'Libellé' => ['required','regex:/^[A-Z0-9][a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                'description' => ['required','regex:/^[A-Z0-9][a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                'prix' =>['required'],
                'sous_categorie_id' =>['required'],
                'Qte_P' =>['required'],
                'poid' =>['required'],
                'image' =>['required'],
                'colors' =>['required']
                ]);
               
            }
            
            
                $vendeur = Vendeur::find(Auth::user()->id);               
                $produit = new Produit;
                $produit->Libellé = $request->Libellé;
                $produit->description = $request->description;
                $produit->Qte_P = $request->Qte_P;                
                $produit->poid = $request->poid;
                $produit->prix = $request->prix;
                $produit->vendeur_id = $vendeur->id;
                $produit->sous_categorie_id = $request->sous_categorie_id;
                $produit->save();

                if(count($request->pointures) != 0){
                        foreach ($request->pointures as $pointure) {
                            $Pointure = new TailleProduit;
                            $Pointure->nom = $pointure;
                            $Pointure->produit_id = $produit->id;
                            $Pointure->save();
                        }
                }
                else if(count($request->tailles) != 0){
                        foreach ($request->tailles as $taille) {
                            $Taille = new TailleProduit;
                            $Taille->nom = $taille;
                            $Taille->produit_id = $produit->id;
                            $Taille->save();
                        }
                }
                foreach ($request->colors as $clr) {
                    $color = new ColorProduit;
                    $color->color_id = $clr;
                    $color->produit_id = $produit->id;
                    $color->save();
                }
                $imageproduit = new Imageproduit; //pour la photo di ychoufoha l users ta3 produit
                $exploded = explode(',', $request->image);
                $decoded = base64_decode($exploded[1]);
                if(str_contains($exploded[0], 'jpeg')){
                    $extension = 'jpg';
                }
                else{
                    $extension = 'png';
                }
                $fileName = str_random().'.'.$extension;
                Storage::put('/public/produits_image/' . $fileName, $decoded);
                $imageproduit->image = $fileName;
                $imageproduit->produit_id = $produit->id;
                $imageproduit->profile = 1;
                $imageproduit->save();
            if($request->images != null ){
                foreach ($request->images as $imgs) {// pour les photos du produits
                    $images = new Imageproduit;
                    $exploded = explode(',', $imgs);
                    $decoded = base64_decode($exploded[1]);
                    if(str_contains($exploded[0], 'jpeg')){
                        $extension = 'jpg';
                    }
                    else{
                        $extension = 'png';
                    }
                    $fileName = str_random().'.'.$extension;
                    Storage::put('/public/produits_image/' . $fileName, $decoded);
                    $images->image = $fileName;
                    $images->produit_id = $produit->id;
                    $images->save();
                }
            }   
                return Response()->json(['etat' => true,'produitAjout' => $produit,'imageProduitAjout' => $imageproduit]);
    }


    public function get_commande_vendeur(){
        $c = Vendeur::find(Auth::user()->id);
        $article = \DB::table('commandes')->where('vendeur_id', $c->id)->orderBy('created_at','desc')->paginate(5);
        $employeur = \DB::table('clients')->get(); 
        $produit = \DB::table('produits')->get(); 
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        
        return view('commande_recu_vendeur',['article'=>$article, 'idAdmin' => $c->id,'emploC' => $employeur,'prV' => $produit,'categorie'=>$categorie,'categorieE'=>$categorieE]);
    } 
    public function detaillsacommandeVendeur(Request $request){
        $commande_detaills = \DB::table('commandes')->where('id', $request->idA)->get();
        return  $commande_detaills;
    }

    public function deleteCommandeVendeur($id){
        $commande = Commande::find($id);
        $commande->delete();
        return Response()->json(['etat' => true]);
    }


    

    public function RecuCommande($id){
        $vendeurCnncte = Vendeur::find(Auth::user()->id);

        $traiter=\DB::table('commandes')->where([ ['vendeur_id',$vendeurCnncte->id],['id','=',$id]])->
            update(['commande_traiter'=>1]);

       /* $traiter = Commande::find($id);
        $traiter->save();
        */session()->flash('success','Cette Commande sera trouvée dans Commande Traitée');
        return $traiter;
    }

    public function RefuserCommande($id){
        $vendeurCnncte = Vendeur::find(Auth::user()->id);

        $traiter=\DB::table('commandes')->where([ ['vendeur_id',$vendeurCnncte->id],['id','=',$id]])->
            update(['commande_traiter'=>1]);

            $client=\DB::table('commandes')->where([ ['vendeur_id',$vendeurCnncte->id],['id','=',$id]])->get();
       
            foreach ($client as $clr) {
                $color = $clr->client_id;
               
            }

            $notification = new Notification;
            $notification->client_id =$color;
            $notification->vendeur_id = $vendeurCnncte->id;
            $notification->cmd_id = $id;
    
            $notification->save();
        session()->flash('success','Cette Commande sera trouvée dans Commande Traité et envoyer une notification pour Ce client lorsque vous avez le refuder ');

       

        return ([$traiter,$notification]);
    }
    public function AjouterVillePrix(Request $request){
       $vendeur = Vendeur::find(Auth::user()->id);
       echo $request;
       $tf = new Tarif_livraison;
       $tf->ville_id = $request->id;
       $tf->vendeur_id = $vendeur->id;
       $tf->prix = $request->prix;
       $tf->save();
       return Response()->json(['etat' => true, 'tf' => $tf]);

    }
    public function deleteProduit($id){
       $imagee = Imageproduit::find($id);
       $produit = Produit::find($id);
       $imagee->delete();
       $produit->delete();
       return Response()->json(['etat' => true]);
    }
    public function updateProduit(Request $request){

        $request->validate([
             'Libellé' => ['required','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
             'description' => ['required','regex:/^[A-Z0-9][a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
         ]);
        $produit2 = Produit::find($request->id);    
        $img = \DB::table('imageproduits')->where('produit_id',$request->id)->get();
          $imageproduit = new Imageproduit; 
                $exploded = explode(',', $request->image);
                $decoded = base64_decode($exploded[1]);
                if(str_contains($exploded[0], 'jpeg')){
                    $extension = 'jpg';
                }
                else{
                    $extension = 'png';
                }
                $fileName = str_random().'.'.$extension;
                Storage::put('/public/produits_image/' . $fileName, $decoded);
                $imageproduit->image = $fileName;
                $imageproduit->produit_id = $produit->id;
                $imageproduit->profile = 1;
                $imageproduit->save();
            if($request->images != null ){
                foreach ($request->images as $imgs) {
                    $images = new Imageproduit;
                    $exploded = explode(',', $imgs);
                    $decoded = base64_decode($exploded[1]);
                    if(str_contains($exploded[0], 'jpeg')){
                        $extension = 'jpg';
                    }
                    else{
                        $extension = 'png';
                    }
                    $fileName = str_random().'.'.$extension;
                    Storage::put('/public/produits_image/' . $fileName, $decoded);
                    $images->image = $fileName;
                    $images->produit_id = $produit->id;
                    $images->save();
                }
            } 
        $produit2->Libellé = $request->Libellé;
        $produit2->description = $request->description;
        $produit2->prix = $request->prix;
        $produit2->poid = $request->poid;
        $produit2->sous_categorie_id = $request->sous_categorie_id;
        $produit2->vendeur_id = $request->vendeur_id;
        $produit2->Qte_P = $request->Qte_P;
       
        $produit2->save();
        return Response()->json(['etat' => true,'produitAjout' => $produit2]);
    
    }

}
 /*$tableIdProduit = [];
        $imageproduit = [];
        foreach ($produit as $p) {
           
            array_push($tableIdProduit,$p->id);
        }
        $c = \DB::table('imageproduits')->select('produit_id')->get();
        foreach ($tableIdProduit as $p) {
            foreach ($c as $img) {
                if($p == $img->produit_id){
                      array_push($imageproduit,\DB::table('imageproduits')->where('produit_id', $p)->get());
                }
            }           
        }*/