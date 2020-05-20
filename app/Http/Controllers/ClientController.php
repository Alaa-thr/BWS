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
    public function getCommande(){
        $client = Client::find(Auth::user()->id);
        $commande = \DB::table('commandes')->where('client_id', $client->id)->get();
        return $commande;

    }

    public function deleteArticle($id){//fnct pour supprimer un article di 3ando un parametre di hoda id ta3 article di nssuprimiwah w tretourni un attributs "etat"(ida kan = true => la supprision n3amlt ghaya)
        $commande = Commande::find($id);//n7awes 3la l article di rena habin nsupprimiwah
        $commande->delete();
        return Response()->json(['etat' => true]);
    }
 

    public function detaillsCommande(Request $request){//fcnt retourné l'article di rena habin n2affichiw les détaills te3o, 3anda un parametre di fih id ta3 article rechercher
        $commande_detaills = \DB::table('commandes')->where('id', $request->idC)->get();
        return  $commande_detaills;
    }



}