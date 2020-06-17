<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employeur;
use App\Demande;
use App\User;
use App\Sous_categorie;
use App\Annonce_emploie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Rules\ModifieTextDescriptionArticle;
use App\Annonce_emploie;
use App\Imageproduit;
use App\ColorProduit;
use App\TailleProduit;
use Auth;
use Validator;

class EmployeurController extends Controller
{
     public function profil_employeur(){
        $employeur=Employeur::find(Auth::user()->id); 
        return view('profil_employeur',['employeur'=>$employeur]);
    }
   public function update_profil(Request $request, $id) {
                

        $employeur = Employeur::find(Auth::user()->id);
        $user = User::find(Auth::user()->id);

        $employeur->nom = $request->input('nom');
        $employeur->prenom = $request->input('prenom');
        $employeur->num_tel = $request->input('num');
        $employeur->email = $request->input('adresse_email'); 
        $employeur->nom_societe = $request->input('societe');

        $user->numTelephone = $request->input('num');
        $user->email = $request->input('adresse_email');  
        
        $employeur->save();
        $user->save();
       
        return redirect('profilEmployeur');
    }
    public function get_commande_traiter_emplyeur(){
        $c = Employeur::find(Auth::user()->id);
        $article = \DB::table('demande_emploies')->where('employeur_id', $c->id)->orderBy('created_at','desc')->paginate(5);
        $employeur = \DB::table('clients')->get(); 
        $produit = \DB::table('annonce_emploies')->get(); 

        return view('demande_emploi_traite_employeur',['article'=>$article, 'idAdmin' => $c->id,'emploC' => $employeur,'prV' => $produit]);
    } 
    public function detaillsacommandeTraiterEmplyeur(Request $request){
        $commande_detaills = \DB::table('demande_emploies')->where('id', $request->idA)->get();
        return  $commande_detaills;
    }


    public function getSousCategories($CategoId){
        $sousCatego = \DB::table('sous_categories')->where('categorie_id',$CategoId)->orderBy('libelle','asc')->get();
        return $sousCatego;
    }

    public function getCategories(){
        $categorie = \DB::table('categories')->where([['id', '<>', 1],['typeCategorie','emploi']])->orderBy('libelle','asc')->get();
        return $categorie;
    }

     public function annonce_emploi(){
        $a = Employeur::find(Auth::user()->id);      
        $annonce = \DB::table('annonce_emploies')->where('employeur_id', $a->id)->orderBy('created_at','desc')->paginate(5) ; 
        return view('annonce_emploi_employeur',['annonce'=>$annonce, 'idEmployeur' => $a->id]);
    }

    public function detaillsAnnonce(Request $request){
        $annonce_detaills = \DB::table('annonce_emploies')->where('id', $request->idAn)->get();
        return  $annonce_detaills;
    }

    public function addAnnonce(Request $request){
                $exploded = explode(',', $request->image);
                $decoded = base64_decode($exploded[1]); 
                if(str_contains($exploded[0], 'jpeg')){
                    $extension = 'jpg';
                }
                else{
                    $extension = 'png';
                }
                $fileName = str_random().'.'.$extension;
                Storage::put('/public/annonces_image/' . $fileName, $decoded);
       
                $annonce2 = new Annonce_emploie;
                $annonce2->libellé = $request->libellé;
                $annonce2->discription = $request->discription;
                $annonce2->employeur_id = $request->employeur_id;
                $annonce2->sous_categorie_id = $request->sous_categorie_id;
                $annonce2->image = $fileName;
                $annonce2->save();
                return Response()->json(['etat' => true,'annonceAjout' => $annonce2]);
    }

    public function deleteAnnonce($id){
        $annonce = Annonce_emploie::find($id);
        $annonce->delete();
        return Response()->json(['etat' => true]);
    }

    public function updateAnnonceButton(Request $request){
        $request->validate([
             'libellé' => [new ModifieTextDescriptionArticle($request->id),'regex:/^[A-Z0-9][a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
             'discription' => [new ModifieTextDescriptionArticle($request->id),'regex:/^[A-Z0-9][a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
         ]);
        $annonce2 = Annonce_emploie::find($request->id);
            
        if($annonce2->image == $request->image){
            $annonce2->image = $request->image;
        }
        else{                  
            $exploded = explode(',', $request->image);
            $decoded = base64_decode($exploded[1]);
            if(str_contains($exploded[0], 'jpeg')){
                $extension = 'jpg';
            }
            else{
                $extension = 'png';
            }
            $fileName = str_random().'.'.$extension;
            Storage::put('/public/annonces_image/' . $fileName, $decoded);
            $annonce2->image = $fileName;
        }
        $annonce2->libellé = $request->libellé;
        $annonce2->discription = $request->discription;
        $annonce2->employeur_id = $request->employeur_id;
        $annonce2->sous_categorie_id=$request->sous_categorie_id;           
        $annonce2->save();
        return Response()->json(['etat' => true,'annonceAjout' => $annonce2]);
    
    }


    public function deleteCommandeTraiterEmployeur($id){
        $commande = Demande::find($id);
        $commande->delete();
        return Response()->json(['etat' => true]);
    }


    public function RecuDemande($id){
        $traiter = Demande::find($id);
        $traiter->demmande_traiter =1;
        $traiter->save();
        session()->flash('success',' Cette Demmande sera trouvée dans Demmande Traitée');
        return $traiter;
    }


}