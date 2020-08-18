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
use App\Paiement_employeur;
use App\ColorProduit;
use App\TailleProduit;
use App\Notificatione;
use Auth;
use App\Rules\NumberExist;
use App\Rules\EmailExist;
use App\Rules\NumCarteBancaireExist;

class EmployeurController extends Controller
{
    public function __construct()
    {
        $this->middleware('logout.user');
        $this->middleware('login.employeur');
        
    }
     public function profil_employeur(){
        if(!Auth::check()){
            return view('page_not_found',['categorie'=>\DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get() ,'categorieE'=>\DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get()]);
            
        }
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $employeur=Employeur::find(Auth::user()->id); 
        return view('profil_employeur',['employeur'=>$employeur,'categorie'=>$categorie ,'categorieE'=>$categorieE]);
    }
    
   public function update_profil(Request $request) {
                
        $request->validate([
             'num_tel' =>  ['required', 'string','regex:/^0[5-7][0-9]+/',"min:10","max:10", new NumberExist(3,$request->id)],
             'email' =>['required', 'string', 'email', 'max:40', new EmailExist(3,$request->id)],
             'nom' =>['required','regex:/[-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
             'prenom' =>['required','regex:/[-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
             'num_compte_banquiare' =>['required','regex:/[0-9]+/', new NumCarteBancaireExist(3,$request->id)],
             'nom_societe' =>['required', 'string','regex:/[-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
             'address' =>['required', 'string','regex:/[-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
         ]);
        $employeur = Employeur::find($request->user_id);
        $user = User::find($request->user_id);

        $employeur->nom = $request->nom;
        $employeur->prenom = $request->prenom;
        $employeur->num_tel = $request->num_tel;
        $employeur->email = $request->email; 
        $employeur->nom_societe = $request->nom_societe;
        $employeur->num_compte_banquiare = $request->num_compte_banquiare;
        $employeur->address = $request->address;

        $user->numTelephone = $request->num_tel;
        $user->email = $request->email;  
        
        $employeur->save();
        $user->save();
       
        return redirect('profilEmployeur');
    }

    public function get_commande_traiter_emplyeur(){
        if(!Auth::check()){
            return view('page_not_found',['categorie'=>\DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get() ,'categorieE'=>\DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get()]);
            
        }
        $c = Employeur::find(Auth::user()->id);
        $article = \DB::table('demande_emploies')
        ->join('clients','clients.id','=','demande_emploies.client_id')
        ->where([['employeur_id', $c->id],['demandeDEmpl',0],['demmande_traiter',1]])
        ->select('demande_emploies.*',\DB::raw('DATE(demande_emploies.created_at) as date'),'clients.nom','clients.prenom')
        ->orderBy('created_at','desc')->paginate(5);
        $employeur = \DB::table('clients')->get(); 
        $produit = \DB::table('annonce_emploies')->get(); 
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        return view('demande_emploi_traite_employeur',['article'=>$article, 'idAdmin' => $c->id,'emploC' => $employeur,'prV' => $produit,'categorie'=>$categorie ,'categorieE'=>$categorieE]);
    } 

    public function detaillsacommandeTraiterEmplyeur(Request $request){
        $empl = Employeur::find(Auth::user()->id);
        $demande_detaills = \DB::table('demande_emploies')->where([['id', $request->idA],['employeur_id',$empl->id]])
        ->select('demande_emploies.*',\DB::raw('DATE(demande_emploies.created_at) as date'))
        ->get();

        $annonce = \DB::table('demande_emploies')
        ->join("annonce_emploies",'annonce_emploies.id','=','demande_emploies.annonceE_id')
        ->where('demande_emploies.id', $request->idA)
        ->select('annonce_emploies.*')
        ->get();

        return  ['demande_detaills'=>$demande_detaills,'annonce'=>$annonce];
    }


    public function getSousCategories($CategoId){
        $sousCatego = \DB::table('sous_categories')->where('categorie_id',$CategoId)->orderBy('libelle','asc')->get();
        return $sousCatego;
    }

    public function getCategories(){
        $e = Employeur::find(Auth::user()->id); 
        $categorie = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $paimentExiste = \DB::table('paiement_employeurs')->where('employeur_id', $e->id)->select('paiment_par')->get();
        return ['categorie'=>$categorie,'paimentExiste'=>$paimentExiste];
    }

     public function annonce_emploi(){
        if(!Auth::check()){
            return view('page_not_found',['categorie'=>\DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get() ,'categorieE'=>\DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get()]);
            
        }
        $a = Employeur::find(Auth::user()->id);
        $produit_signaler = \DB::table('notificationes')
           ->where([['employeur_id', $a->id],['nom_annonce','<>',null]])
           ->get();
        $prdS_nom = '';
        $i=0;
        foreach($produit_signaler as $prd){
            if($prdS_nom == ''){
                $prdS_nom .= ' '.$prd->nom_annonce;
            }
            else{
                $prdS_nom .= ', '.$prd->nom_annonce;
            }
           $i++;
           
            
        } 
        if(count($produit_signaler) != 0 && $i == 1){

          session()->flash('danger',"Votre annonces '".$prdS_nom." ' il a été supprimé, car il est signalé 3 fois ou plus.");
        }
        if(count($produit_signaler) != 0 && $i > 1){

          session()->flash('danger',"Votre annonces '".$prdS_nom." ' ils ont été supprimés car ils ont été signalés au moins trois fois.");
        }  
        \DB::table('notificationes')->where([['employeur_id', $vendeur->id],['nom_annonce','<>',null]])->delete(); 
        $notif =  \DB::table('paiement_employeurs')->where('employeur_id', $a->id)->select('paiment_par')->get();  
        $annonce = \DB::table('annonce_emploies')->where('employeur_id', $a->id)->orderBy('created_at','desc')->paginate(6) ; 
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $idbigAdmin= \DB::table('admins')
        ->where('id',1)
        ->select('numCarteBanquaire')
        ->get();
        return view('annonce_emploi_employeur',['annonce'=>$annonce, 'idEmployeur' => $a->id,'categorie'=>$categorie ,'categorieE'=>$categorieE,'idbigAdmin'=>$idbigAdmin,'notif'=>$notif]);
    }

    public function detaillsAnnonce(Request $request){
        $annonce_detaills = \DB::table('annonce_emploies')
        ->join('sous_categories','sous_categories.id','=','annonce_emploies.sous_categorie_id')
        ->join('categories','categories.id','=','sous_categories.categorie_id')
        ->select('annonce_emploies.*','sous_categories.libelle as nomSCatego','categories.libelle as nomCatego','categories.id as categorie_id')
        ->where('annonce_emploies.id', $request->idAn)->get();
        return  $annonce_detaills;
    }
    public function verifierInputsAnnonce(Request $request){
            $request->validate([
                     'libellé' => ['required','string','max:70','min:3','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                     'discription' => ['required','min:3','string','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                     'nombre_condidat' => ['required'],
                     'sous_categorie_id' => ['required'],
                     'image' => ['nullable','sometimes','regex:/^data:image/']
            ]);
            return true;
    }

    public function addpaiment(Request $request){
                $request->validate([
                     'typePaiment' => ['required']
                ]);
                $ECnncte = Employeur::find(Auth::user()->id);
                $paiemtE = new Paiement_employeur;
                $paiemtE->employeur_id = $ECnncte->id;
                $paiemtE->paiment_par = $request->typePaiment;
                $paiemtE->save();
                $notif = new Notificatione;
                $notif->paiement_employeur_id = $ECnncte->id;
                $notif->save();
                return Response()->json(['etat' => true]);
    }

    public function addannoncepaiment(Request $request){
                $request->validate([
                     'typePaiment' => ['required']
                ]);
                $ECnncte = Employeur::find(Auth::user()->id);
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
                $paiemtE = new Paiement_employeur;
                $paiemtE->employeur_id = $ECnncte->id;
                $paiemtE->paiment_par = $request->typePaiment;
                $paiemtE->save();
                $notif = new Notificatione;
                $notif->paiement_employeur_id = $ECnncte->id;
                $notif->save();
                return Response()->json(['etat' => true,'annonceAjout' => $annonce2]);
    }
    public function addAnnonce(Request $request){
                $request->validate([
                     'libellé' => ['required','string','max:70','min:3','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                     'discription' => ['required','min:3','string','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                     'nombre_condidat' => ['required'],
                     'sous_categorie_id' => ['required'],
                     'image' => ['nullable','sometimes','regex:/^data:image/']
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
        if($request->image == ''){
            $annonce2->image = null;
        }
        else if($annonce2->image == $request->image){
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



    public function RecuDemande($id){
        $traiter = Demande_emploie::find($id);
        $traiter->demmande_traiter =1;
        $traiter->save();
        return $traiter;
    }

    public function validateForm(Request $request){
    
        
        $request->validate([
       'libellé' => ['required','regex:/^[A-Z0-9][a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
       'discription' => ['required','regex:/^[A-Z0-9][a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
       'nombre_condidat' =>['required'],
       'sous_categorie_id' =>['required'],

        ]);
   
        return Response()->json(['etat' => true]);

    
}
}
