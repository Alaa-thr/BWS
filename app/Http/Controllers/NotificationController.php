<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\Notification;
use App\Employeur;
use App\Vendeur;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Rules\ModifieTextDescriptionArticle;
use App\User;
use Auth; 

class NotificationController extends Controller
{
    public function get_notification_client(){
        $c = Client::find(Auth::user()->id);
        $article = \DB::table('notifications')->where('client_id', $c->id)->orderBy('created_at','desc')->paginate(5) ;
        $employeur = \DB::table('employeurs')->get(); 
        $vendeur = \DB::table('vendeurs')->get(); 
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get(); 
        $favoris = \DB::table('produits')->get();
        $imageproduit = \DB::table('imageproduits')->get();
        $command = \DB::table('commandes')->where([ ['client_id',$c->id],['commande_envoyee',0]])->get();     
        $prixTotale= \DB::table('commandes')->where([ ['client_id',$c->id],['id',$c->nbr_cmd]])->select(\DB::raw('sum(commandes.prix_total * commandes.qte) as prixTo'))->get();
        if($prixTotale[0]->prixTo == null){
                $prixTotale[0]->prixTo = 0.00;
        }
        return view('notification_client',['article'=>$article, 'idAdmin' => $c->id,'emploC' => $employeur,'vendeurC' => $vendeur,'categorie'=>$categorie ,'categorieE'=>$categorieE,'ImageP' => $imageproduit, 'Fav' => $favoris,'command' => $command,'prixTotale' => $prixTotale]);
    } 

   
    
    public function deleteNotificationClient($id){
        $notification = Notification::find($id);
        $notification->delete();
        return Response()->json(['etat' => true]);
    }
}
