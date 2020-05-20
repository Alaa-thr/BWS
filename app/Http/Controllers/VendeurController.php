<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vendeur;
use App\User;
use App\Produit;
use App\Imageproduit;
use Illuminate\Support\Facades\Storage;
use Auth;

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
        $produit = \DB::table('produits')->where('vendeur_id', $vendeur->id)->orderBy('created_at','desc')->get();
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
        $imageproduit = \DB::table('imageproduits')->get();
        return ['produit' =>$produit,"ImageP" => $imageproduit] ;
    }

    public function getSousCategories($CategoId){
        $sousCatego = \DB::table('sous_categories')->where('categorie_id',$CategoId)->orderBy('libelle','asc')->get();
        return $sousCatego;
    }

    public function getCategories(){
        $categorie = \DB::table('categories')->where('id', '<>', 1)->orderBy('libelle','asc')->get();
        return $categorie;
    }

    public function addProduit(Request $request){
                $vendeur = Vendeur::find(Auth::user()->id);
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
                
                $produit = new Produit;
                $produit->Libellé = $request->Libellé;
                $produit->description = $request->description;
                $produit->Qte_P = $request->Qte_P;                
                $produit->poid = $request->poid;
                $produit->prix = $request->prix;
                $produit->vendeur_id = $vendeur->id;
                $produit->sous_categorie_id = $request->sous_categorie_id;
                $produit->save();
                $imageproduit = new Imageproduit;
                $imageproduit->image = $fileName;
                $imageproduit->produit_id = $produit->id;
                $imageproduit->save();
                return Response()->json(['etat' => true,'produitAjout' => $produit,'imageProduitAjout' => $imageproduit]);
    }



}