<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendeur;
use App\User;
use App\Produit;
use App\Imageproduit;
use App\ColorProduit;
use App\TailleProduit;
use Illuminate\Support\Facades\Storage;
use Auth;
use Validator;

class VendeurController extends Controller
{
     public function profil_vendeur(){
        $vendeur = Vendeur::find(Auth::user()->id); 
        return view('profil_vendeur',['vendeur'=>$vendeur]);
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
        return view('produit_vendeur',['produit'=>$produit, 'ImageP' => $imageproduit]);
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