<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employeur;
use App\Demande_emploie;
use App\User;
use App\Sous_categorie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Rules\ModifieTextDescriptionArticle;
use App\Annonce_emploie;
use App\Imageproduit;
use App\ColorProduit;
use App\TailleProduit;
use Auth;

use DB;


class EmployeurController extends Controller
{
     public function profil_employeur(){
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $employeur=Employeur::find(Auth::user()->id); 
        return view('profil_employeur',['employeur'=>$employeur,'categorie'=>$categorie ,'categorieE'=>$categorieE]);
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

        $article = \DB::table('demande_emploies')
       
        ->select('*',\DB::raw('DATE(demande_emploies.created_at) as date'))
        ->where('demande_emploies.employeur_id', $c->id)->orderBy('demande_emploies.created_at','desc')->paginate(5);

        $employeur = \DB::table('clients')->get();

        $produit = \DB::table('annonce_emploies')->get(); 

        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        return view('demande_emploi_traite_employeur',['article'=>$article, 'idAdmin' => $c->id,'emploC' => $employeur,'prV' => $produit,'categorie'=>$categorie ,'categorieE'=>$categorieE]);
    } 

    public function detaillsacommandeTraiterEmplyeur(Request $request){
         $empl = Employeur::find(Auth::user()->id);
        $commande_detaills = \DB::table('demande_emploies')
        ->join('clients','clients.id','=','demande_emploies.client_id')
        ->join('annonce_emploies','annonce_emploies.id','=','demande_emploies.annonceE_id')
        ->select('demande_emploies.id','clients.nom','clients.prenom','annonce_emploies.libellé','annonce_emploies.discription',\DB::raw('DATE(demande_emploies.created_at) as date'))
        ->where([['demande_emploies.id', $request->idA],['demande_emploies.employeur_id','=',$empl->id]])->get();
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
        $annonce = \DB::table('annonce_emploies')->where('employeur_id', $a->id)->orderBy('created_at','desc')->paginate(6) ; 
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $notification = \DB::table('notifications')->get();

        foreach($notification as $noti){
           

            
            if($noti->employeur_id === $a->id AND $noti->DeleteNotif === 0){
                session()->flash('danger','Votre Produit :  ' .$noti->nomProduit  .'  était Supprimer car il est Signaler 3 fois');
               /* $noti->DeleteNotif = 1;
                $noti->save();
               */ \DB::table('notifications')->where([['employeur_id',$a->id],['DeleteNotif',0]])->update(['DeleteNotif' => 1]);
           }
            
        }
        
        return view('annonce_emploi_employeur',['annonce'=>$annonce, 'idEmployeur' => $a->id,'categorie'=>$categorie ,'categorieE'=>$categorieE]);
    }

    public function detaillsAnnonce(Request $request){
        $annonce_detaills = \DB::table('annonce_emploies')->where('id', $request->idAn)->get();
        return  $annonce_detaills;
    }

    public function addAnnonce(Request $request){
                $request->validate([
                     'libellé' => ['required','string','max:70','min:3','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                     'discription' => ['required','min:3','string','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                     'nombre_condidat' => ['required'],
                     'sous_categorie_id' => ['required'],
                 ]);
                $annonce2 = new Annonce_emploie;
                if($request->image != null){
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
                $annonce2->nombre_condidat = $request->nombre_condidat;
                $annonce2->discription = $request->discription;
                $annonce2->employeur_id = $request->employeur_id;
                $annonce2->sous_categorie_id = $request->sous_categorie_id;
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
                     'libellé' => ['required','string','max:70','min:3','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                     'discription' => ['required','min:3','string','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                     'nombre_condidat' => ['required'],
                     'sous_categorie_id' => ['required'],
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
        $traiter = Demande_emploie::find($id);
        $traiter->demmande_traiter =1;
        $traiter->save();
        session()->flash('success',' Cette Demmande sera trouvée dans Demmande Traitée');
        return $traiter;
    }


}
