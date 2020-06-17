<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employeur;
use App\Demande;
use App\User;
use App\Annonce_emploie;
use App\Imageproduit;
use App\ColorProduit;
use App\TailleProduit;
use Illuminate\Support\Facades\Storage;
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