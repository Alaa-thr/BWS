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
use App\Notificatione;
use App\ColorProduit;
use App\Paiement_vendeur;
use App\TailleProduit;
use App\Tarif_livraison;
use App\Rules\ModifieLibelleDescriptionProduit;
use App\Rules\NumberExist;
use App\Rules\EmailExist;
use App\Rules\NumCarteBancaireExist;
use App\Typechoisirvendeur;
use Illuminate\Support\Facades\Storage;
use Auth;
use Validator;

class VendeurController extends Controller
{
    public function __construct()
    {
        $this->middleware('logout.user');
        $this->middleware('login.vendeur');
    }
     public function profil_vendeur(){
        if(!Auth::check()){
            return view('page_not_found',['categorie'=>\DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get() ,'categorieE'=>\DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get()]);
            
        }
        $vendeur = Vendeur::find(Auth::user()->id);
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get(); 
        return view('profil_vendeur',['vendeur'=>$vendeur,'categorie'=>$categorie,'categorieE'=>$categorieE]);
    }
    public function update_profil(Request $request) {
        $request->validate([
             'numTelephone' =>  ['required', 'string','regex:/^0[5-7][0-9]+/',"min:10","max:10", new NumberExist(2,$request->id)],
             'email' =>['required', 'string', 'email', 'max:40', new EmailExist(2,$request->id)],
             'Nom' =>['required','regex:/[-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
             'Prenom' =>['required','regex:/[-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
             'Num_Compte_Banquaire' =>['required','regex:/[0-9]+/', new NumCarteBancaireExist(2,$request->id)],
             'Nom_boutique' =>['required', 'string','regex:/[-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
             'Addresse' =>['required', 'string','regex:/[-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
         ]);

        $vendeur = Vendeur::find($request->user_id);
        $user = User::find($request->user_id);

        $vendeur->Nom = $request->Nom;
        $vendeur->Prenom = $request->Prenom;
        $vendeur->numTelephone = $request->numTelephone;
        $vendeur->email = $request->email; 
        $vendeur->Num_Compte_Banquaire = $request->Num_Compte_Banquaire;
        $vendeur->Nom_boutique = $request->Nom_boutique;
        $vendeur->Addresse = $request->Addresse;

        $user->numTelephone = $request->numTelephone;
        $user->email = $request->email;  
        
        $vendeur->save();
        $user->save();
       
        return redirect('profilVendeur');
    }

    public function getProduit(){
        if(!Auth::check()){
            return view('page_not_found',['categorie'=>\DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get() ,'categorieE'=>\DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get()]);
            
        }
        $vendeur = Vendeur::find(Auth::user()->id);
        $produit_signaler = \DB::table('notificationes')
           ->where([['vendeur_id', $vendeur->id],['nom_produit','<>',null]])
           ->get();
        $prdS_nom = '';
        $i=0;
        foreach($produit_signaler as $prd){
            if($prdS_nom == ''){
                $prdS_nom .= ' '.$prd->nom_produit;
            }
            else{
                $prdS_nom .= ', '.$prd->nom_produit;
            }
           $i++;
           
            
        } 
        if(count($produit_signaler) != 0 && $i == 1){

          session()->flash('danger',"Votre Produit '".$prdS_nom." ' il a été supprimé, car il est signalé 3 fois ou plus.");
        }
        if(count($produit_signaler) != 0 && $i > 1){

          session()->flash('danger',"Votre Produit '".$prdS_nom." ' ils ont été supprimés car ils ont été signalés au moins trois fois.");
        }
        \DB::table('notificationes')->where([['vendeur_id', $vendeur->id],['nom_produit','<>',null]])->delete();
        $paier = \DB::table('paiement_vendeurs')->where('vendeur_id', $vendeur->id)->get();
        if(count($paier) == 0 ){
                $notPaier = 0;
        }
        else{
            $notPaier = 1;
        }
        $produitsQuantite = \DB::table('produits')->where([['vendeur_id', $vendeur->id],['Qte_P',0]])->get();             
        $prdQ_nom = '';
        $i=0;
        foreach($produitsQuantite as $prd){
            if($prdQ_nom == ''){
                $prdQ_nom .= ' '.$prd->Libellé;
            }
            else{
                $prdQ_nom .= ', '.$prd->Libellé;
            }
           $i++;
            \DB::table('produits')->where('id', $prd->id)->delete();
            
        } 
        if(count($produitsQuantite) != 0 && $i == 1){

          session()->flash('info',"Votre Produit '".$prdQ_nom." ' il a été supprimé,car la quantité devenu 0 apres l'acceptation du l'achat.");
        }
        if(count($produitsQuantite) != 0 && $i > 1){

          session()->flash('info',"Votre Produit '".$prdQ_nom." ' ils ont été supprimés car la quantité devenu 0 apres l'acceptation du l'achat.");
        }
        $produit = \DB::table('produits')->where('vendeur_id', $vendeur->id)->orderBy('created_at','desc')->paginate(8); 
        $imageproduit = \DB::table('imageproduits')->get();
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        
        
        $idbigAdmin= \DB::table('admins')
        ->where('id',1)
        ->select('numCarteBanquaire')
        ->get();
        return view('produit_vendeur',['produit'=>$produit, 'ImageP' => $imageproduit,'categorie'=>$categorie,'categorieE'=>$categorieE,'notPaier'=>$notPaier,'idbigAdmin'=>$idbigAdmin]);
    }

    public function getSousCategories($CategoId){
        $sousCatego = \DB::table('sous_categories')->where('categorie_id',$CategoId)->orderBy('libelle','asc')->get();
        return $sousCatego;
    }

    public function getCategories(){
        $categorie = \DB::table('categories')->where([  ['typeCategorie','shop']])->orderBy('libelle','asc')->get();
        return $categorie;
    }
    public function getColors(){
        $color = \DB::table('colors')->orderBy('nom','asc')->get();
        return $color;
    }

    public function addProduitWithTest(Request $request){
       
            if( $request->typet == 2){
                 $request->validate([
                'Libellé' => ['required','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                'description' => ['required','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                'prix' =>['required'],
                'sous_categorie_id' =>['required'],
                'Qte_P' =>['required'],
                'image' => ['required','sometimes','regex:/^data:image/'],
                'colors' =>['required'],
                'pointures' =>['required']
                 ]);
            }
             if( $request->typet == 1){               
                $request->validate([
                'Libellé' => ['required','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                'description' => ['required','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                'prix' =>['required'],
                'sous_categorie_id' =>['required'],
                'Qte_P' =>['required'],
                'image' => ['required','sometimes','regex:/^data:image/'],
                'colors' =>['required'],
                'tailles' =>['required']
                ]);
            }
            else{
                $request->validate([
                'Libellé' => ['required','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                'description' => ['required','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                'prix' =>['required'],
                'sous_categorie_id' =>['required'],
                'Qte_P' =>['required'],
                'image' =>['required','regex:/^data:image/'],
                'colors' =>['required']
                ]);
               
            }
            
            
                $vendeur = Vendeur::find(Auth::user()->id);               
                $produit = new Produit;
                $produit->Libellé = $request->Libellé;
                $produit->description = $request->description;
                $produit->Qte_P = $request->Qte_P; 
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

    public function verifierInputs(Request $request){
        if( $request->typet == 2){
                 $request->validate([
                'Libellé' => ['required','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                'description' => ['required','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                'prix' =>['required'],
                'sous_categorie_id' =>['required'],
                'Qte_P' =>['required'],
                'image' =>['required','regex:/^data:image/'],
                'colors' =>['required'],
                'pointures' =>['required']
                 ]);
            }
             if( $request->typet == 1){               
                $request->validate([
                'Libellé' => ['required','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                'description' => ['required','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                'prix' =>['required'],
                'sous_categorie_id' =>['required'],
                'Qte_P' =>['required'],
                'image' =>['required','regex:/^data:image/'],
                'colors' =>['required'],
                'tailles' =>['required']
                ]);
            }
            else{
                $request->validate([
                'Libellé' => ['required','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                'description' => ['required','regex:/^[A-Z0-9][-a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                'prix' =>['required'],
                'sous_categorie_id' =>['required'],
                'Qte_P' =>['required'],
                'image' =>['required','regex:/^data:image/'],
                'colors' =>['required']
                ]);
               
            }
            $vendeur = Vendeur::find(Auth::user()->id); 
            $paimentExiste = \DB::table('paiement_vendeurs')->where('vendeur_id', $vendeur->id)->get();
            return $paimentExiste;
    }
    public function addProduit(Request $request){
       
            $vendeur = Vendeur::find(Auth::user()->id);               
                $produit = new Produit;
                $produit->Libellé = $request->Libellé;
                $produit->description = $request->description;
                $produit->Qte_P = $request->Qte_P;
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

    public function addpaiment(Request $request)
    {
        $vendeur = Vendeur::find(Auth::user()->id);               
        $paiemtV = new Paiement_vendeur;
        $paiemtV->vendeur_id = $vendeur->id;
        $paiemtV->save();
        $notif = new Notificatione;
        $notif->paiement_vendeur_id = $vendeur->id;
        $notif->save();   
        return Response()->json(['etat' => true]);
    }
    public function addProduitwithPaiment(Request $request){
       
            $vendeur = Vendeur::find(Auth::user()->id);               
                $produit = new Produit;
                $produit->Libellé = $request->Libellé;
                $produit->description = $request->description;
                $produit->Qte_P = $request->Qte_P;
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
                $paiemtV = new Paiement_vendeur;
                $paiemtV->vendeur_id = $vendeur->id;
                $paiemtV->save();
                $notif = new Notificatione;
                $notif->paiement_vendeur_id = $vendeur->id;
                $notif->save();   
                return Response()->json(['etat' => true,'produitAjout' => $produit,'imageProduitAjout' => $imageproduit]);
    }


    public function get_commande_vendeur(){
        if(!Auth::check()){
            return view('page_not_found',['categorie'=>\DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get() ,'categorieE'=>\DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get()]);
            
        }
        $c = Vendeur::find(Auth::user()->id);
        $article = \DB::table('commandes')
        ->where([['vendeur_id', $c->id],['commande_envoyee', 1],['commande_traiter', 0]])
        ->select('id','client_id')
        ->distinct('id','client_id')
        ->orderBy('created_at','desc')
        ->paginate(5);
        $prixx =\DB::table('commandes')
            ->join("villes",'villes.nom','commandes.ville')
            ->where([['commandes.vendeur_id', $c->id],['commande_envoyee', 1]])
            ->select('commandes.prix_produit','commandes.qte','commandes.vendeur_id','commandes.id','ville','client_id','commandes.type_livraison')
            ->get();
        $tarif =\DB::table('tarif_livraisons')
            ->join("villes",'villes.id','tarif_livraisons.ville_id')
            ->where([['tarif_livraisons.vendeur_id', $c->id]])
            ->select('tarif_livraisons.*','villes.nom')
            ->get();   
        
        $cmd =\DB::table('commandes')
        ->join('clients','clients.id','=','commandes.client_id')
        ->where('commandes.vendeur_id', $c->id)
        ->select('commandes.*','clients.nom','clients.prenom',\DB::raw('DATE(commandes.created_at) as date'))
        ->get();  
        $employeur = \DB::table('clients')->get(); 
        $produit = \DB::table('produits')->get(); 
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        return view('commande_recu_vendeur',['article'=>$article, 'idAdmin' => $c->id,'emploC' => $employeur,'prV' => $produit,'categorie'=>$categorie,'categorieE'=>$categorieE,'cmd'=>$cmd,'prixx'=>$prixx,'tarif'=>$tarif]);
    } 

    public function detaillsacommandeVendeur(Request $request){
        $v = Vendeur::find(Auth::user()->id);
        $commande_detaills = \DB::table('commandes')
        ->join('clients','clients.id','=','commandes.client_id')
        ->join('colors','colors.id','=','commandes.couleur_id')
        ->join('produits','produits.id','=','commandes.produit_id')
        ->join('imageproduits','imageproduits.produit_id','=','commandes.produit_id')
        ->where([['commandes.id', $request->idA],['commandes.client_id',$request->idClient],['imageproduits.profile',1],['commandes.vendeur_id',$v->id]])
        ->select('commandes.*','imageproduits.image','colors.nom','produits.Libellé','clients.nom as nom_client','clients.prenom as prenom_client','clients.id as id_client')
        ->distinct('commandes.id')
        ->get();
        $notif = \DB::table('notificationes')
        ->where([['client_id',$request->idClient],['vendeur_id',$v->id],['cmd_id',$request->idA]])
        ->select("cause")
        ->get();
        return  ['commande_detaills'=>$commande_detaills,'notif'=>$notif];
    }

    

    public function RecuCommande($idCmd,$idClient){
        \DB::table('commandes')->where([['id',$idCmd],['client_id',$idClient],['vendeur_id',Vendeur::find(Auth::user()->id)->id]])->update(['commande_traiter' => 1,'Réponse_vendeur'=>0]);
        $produit = \DB::table('commandes')->where([['id',$idCmd],['client_id',$idClient],['vendeur_id',Vendeur::find(Auth::user()->id)->id]])->get();
        foreach ($produit as $key ) {
            $prdt=\DB::table('produits')->where('id',$key->produit_id)->get();
            $qte = $prdt[0]->Qte_P-$key->qte;
            \DB::table('produits')->where('id',$key->produit_id)->update(['Qte_P' => $qte]);

        }
        $traiter = \DB::table('commandes')->where([['id',$idCmd],['client_id',$idClient],['vendeur_id',Vendeur::find(Auth::user()->id)->id]])->take(1)->get();
        return ["traiter" =>$traiter];
    }

     public function RefuserCommande($idCmd,$idClient,$cause){
            $vendeurCnncte = Vendeur::find(Auth::user()->id);
             \DB::table('commandes')->where([['id',$idCmd],['client_id',$idClient],['commandes.vendeur_id',$vendeurCnncte->id]])->update(['commande_traiter' => 1]);
            $notification = new Notificatione;
            $notification->client_id =$idClient;
            $notification->vendeur_id = $vendeurCnncte->id;
            $notification->cmd_id = $idCmd;
            $notification->cause = $cause;
            $notification->save();
       return true;
    }
    public function getTypeLVendeur(){
        $vendeur = Vendeur::find(Auth::user()->id);
        $type = \DB::table("typechoisirvendeurs")
        ->where([['vendeur_id', $vendeur->id],['type_livraison','vc']])
        ->select('type_livraison')
        ->get();
        $tarif = \DB::table('tarif_livraisons')
       ->where('vendeur_id',$vendeur->id)
       ->get();
       $paiment = \DB::table('paiement_vendeurs')
            ->where('vendeur_id',$vendeur->id)
            ->get();

        if(count($type) != 0 && count($tarif) != 0){
            if(count($paiment) == 0){
                return ['etat'=>false, 'paiment' =>true];
            }
            else{
                return ['etat'=>false, 'paiment' =>false];
            }
            
        }
        else if(count($type) != 0 && count($tarif) == 0){
            if(count($paiment) == 0){
                return ['etat'=>true, 'paiment' =>true];
            }
            else{
                return ['etat'=>true, 'paiment' =>false];
            }
        }
        else if(count($type) == 0){
            if(count($paiment) == 0){
                return ['etat'=>false, 'paiment' =>true];
            }
            else{
                return ['etat'=>false, 'paiment' =>false];
            }
           
        }

    }

    public function getPaimentVendeurr(){
        $vendeur = Vendeur::find(Auth::user()->id);
        $paiment = \DB::table('paiement_vendeurs')
            ->where('vendeur_id',$vendeur->id)
            ->get();
        if(count($paiment) == 0){
            return true;
        }
        else{
            return false;
        }

    }

    public function AjouterVillePrix(Request $request){
       $vendeur = Vendeur::find(Auth::user()->id);
       $tarif = \DB::table('tarif_livraisons')
       ->where([['ville_id',$request->id],['vendeur_id',$vendeur->id]])
       ->get();
       $tf = new Tarif_livraison;
       if (count($tarif) == 0) {
           
           $tf->ville_id = $request->id;
           $tf->vendeur_id = $vendeur->id;
           $tf->prix = $request->prix;
           $tf->save();
       }
       else{
            \DB::table('tarif_livraisons')
           ->where([['ville_id',$request->id],['vendeur_id',$vendeur->id]])
           ->update(['prix' => $request->prix]);
        }
        
       return Response()->json(['etat' => true]);

    }

    public function deleteTypeLivr($id){
       $vendeur = Vendeur::find(Auth::user()->id);
        \DB::table('typechoisirvendeurs')
           ->where([['type_livraison',$id],['vendeur_id',$vendeur->id]])
           ->delete();
       return Response()->json(['etat' => true]);
    }

    public function addTypeLivr(Request $request){
       $vendeur = Vendeur::find(Auth::user()->id);
       $typeAdd = new Typechoisirvendeur;
       $typeAdd->vendeur_id  = $vendeur->id;
       $typeAdd->type_livraison  = $request->type;
       $typeAdd->save();
       return Response()->json(['etat' => true]);
    }

    public function deleteProduit($id){
       $imagee = Imageproduit::find($id);
       $produit = Produit::find($id);
       $imagee->delete();
       $produit->delete();
       return Response()->json(['etat' => true]);
    }

    public function getDetailsProduitVendeur($id){
        $vendeur = Vendeur::find(Auth::user()->id);
        $colors = \DB::table("color_produits")
        ->join('colors','colors.id','=','color_produits.color_id')
        ->where("color_produits.produit_id",$id)
        ->select('nom')
        ->get();
        $taille = \DB::table("taille_produits")
        ->where("produit_id",$id)
        ->select('nom','produit_id')
        ->get();
        $typeL = \DB::table("typechoisirvendeurs")
        ->where("vendeur_id",$vendeur->id)
        ->select('type_livraison')
        ->get();
        $produit = \DB::table("produits")
        ->join('sous_categories','sous_categories.id','=','produits.sous_categorie_id')
        ->join('categories','categories.id','=','sous_categories.categorie_id')
        ->select('produits.*','sous_categories.libelle','categories.libelle as nomCatego','categories.id as categorie_id')
        ->where([["vendeur_id",$vendeur->id],['produits.id',$id]])
        ->get();

        return ["colors"=> $colors,"taille"=> $taille,"typeL"=> $typeL,"produit"=> $produit];

    }

    public function updateProduit(Request $request){
        $tab =array();
        $vendeur = Vendeur::find(Auth::user()->id);
        $produit2 = Produit::find($request->id);
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
                Storage::put('/public/produits_image/' . $fileName, $decoded);
                \DB::table('imageproduits')
                    ->where([['produit_id', $request->id],['profile',1]])
                    ->update(['image' => $fileName]);
        }
        if(count($request->images) != 0 ){
            $pic = \DB::table('imageproduits')
                    ->where([['produit_id', $request->id],['profile',0]])
                    ->select('id')
                    ->get();
            $i=0; 
                foreach ($request->images as $imgs) {
                    if(count($pic)-1 < $i){
                        $imageproduit = new Imageproduit;
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
                        $imageproduit->image = $fileName;
                        $imageproduit->produit_id = $produit2->id;
                        $imageproduit->profile = 0;
                        $imageproduit->save();
                    }
                    else{
                        array_push($tab, $pic[$i]->id);
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
                        \DB::table('imageproduits')
                        ->where([['produit_id', $request->id],['profile',0],['id',$pic[$i]->id]])
                        ->update(['image' => $fileName]);

                    }
                    $i++;

                }
               
                if(count($pic) > $i){
                   
                    
                    $supp=\DB::table('imageproduits')
                    ->where([['produit_id', $request->id],['profile',0]])
                    ->whereNotIn('id', $tab)
                    ->delete();
                   
                }

            
        }       
        if(count($request->colors)!=0){
            foreach ($request->colors as $clr) {
                    $color = new ColorProduit;
                    $color->color_id = $clr;
                    $color->produit_id = $produit->id;
                    $color->save();
            }

        }
        if(count($request->pointures)!=0){
            foreach ($request->pointures as $pointure) {
                    $Pointure = new TailleProduit;
                    $Pointure->nom = $pointure;
                    $Pointure->produit_id = $produit->id;
                    $Pointure->save();
            }

        }  
        if(count($request->tailles)!=0){
            foreach ($request->tailles as $taille) {
                    $Taille = new TailleProduit;
                    $Taille->nom = $taille;
                    $Taille->produit_id = $produit->id;
                    $Taille->save();
            }

        }  
        $produit2->Libellé = $request->Libellé;
        $produit2->description = $request->description;
        $produit2->prix = $request->prix;
        $produit2->sous_categorie_id = $request->sous_categorie_id;
        $produit2->vendeur_id = $vendeur->id;
        $produit2->Qte_P = $request->Qte_P;
       
        $produit2->save();
        return Response()->json(['etat' => true,'produitAjout' => $produit2]);
    
    }

    public function tarifVille(){
        $vendeur = Vendeur::find(Auth::user()->id);
        $tarifv = \DB::table('tarif_livraisons')
            ->join('villes','villes.id','=','tarif_livraisons.ville_id')
            ->where([['vendeur_id', $vendeur->id]])
            ->select('nom','prix')
            ->orderBy('nom','asc')
            ->get();
        $typeL = \DB::table('typechoisirvendeurs')
            ->where([['vendeur_id', $vendeur->id]])
            ->select('type_livraison')
            ->get();
        $allType = ['dhl','cv','vc'];
        $typeLNotExiste  = array();
        foreach ($allType as $key ) {
            for ($i=0,$j=0; $i <count($typeL) ; $i++) { 
                if($key == $typeL[$i]->type_livraison){
                    $j++;
                    $i=count($typeL);
                }
            }
            if($j == 0){
                array_push($typeLNotExiste, ["type_livraison"=>$key]);
            }
        }

        return ["tarifv" =>$tarifv,"typeL" =>$typeL,"typeLNotExiste" =>$typeLNotExiste];
    }
    public function validateFormProduit(Request $request){
    
        
        $request->validate([
            'Libellé' => ['required','regex:/^[A-Z0-9][a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
            'description' => ['required','regex:/^[A-Z0-9][a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
            'prix' =>['required'],
            'sous_categorie_id' =>['required'],
            'Qte_P' =>['required'],
           
             ]);
       
            return Response()->json(['etat' => true]);

        
    }
    public function deleteCommandeVendeur( $idCmd, $idClient,$idVendeur){
        
        $commande = \DB::table('commandes')
            ->where([['vendeur_id', $idVendeur],['id', $idCmd],['client_id', $idClient]])
            ->update(['CmdVendeurDelete'=>1]);

        return Response()->json(['etat' => true]);
    }
     public function getstatistique(){
        if(!Auth::check()){
            return view('page_not_found',['categorie'=>\DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get() ,'categorieE'=>\DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get()]);
            
        }
        $vendeur = Vendeur::find(Auth::user()->id);
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
        $achatParMois = \DB::table('commandes')->where([['Réponse_vendeur',0],['commande_envoyee',1],['vendeur_id',$vendeur->id]])->select(\DB::raw('count(id) as `nombre_Achat`'),\DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
           ->groupby('month','year')
           ->having('year','=',date("Y"))
           ->get();
        $produitPlusAcheter = \DB::table('commandes')
            ->join("produits",'produits.id','=','commandes.produit_id')
            ->where([['commandes.Réponse_vendeur',0],['commandes.commande_envoyee',1],['commandes.vendeur_id',$vendeur->id]])->select(\DB::raw('count(produit_id) as `produit_Plus_Achater`'),'produits.Libellé','commandes.produit_id',\DB::raw('YEAR(commandes.created_at) year'))
           ->groupby('commandes.produit_id','produits.Libellé','commandes.produit_id','year')
            ->having('year','=',date("Y"))
           ->orderBy('produit_Plus_Achater','asc')
           ->get(); 
        $produits = \DB::table('produits')
            ->join('imageproduits','imageproduits.produit_id','=','produits.id')
            ->where([['vendeur_id',$vendeur->id],['imageproduits.profile',1]])
            ->select('Libellé','prix','Qte_P','image','Qte_P','prix','produits.id')
            ->get(); 
        $villeFaitAchat =\DB::table('commandes')
            ->where([['commandes.Réponse_vendeur',0],['commandes.commande_envoyee',1],['commandes.vendeur_id',$vendeur->id]])->select(\DB::raw('count(ville) as `ville_Fait_Achat`'),'ville')
           ->groupby('ville')
           ->orderBy('ville_Fait_Achat','asc')
           ->get(); 
        $produitsJamaisAchete = \DB::table('produits')
            ->whereNotExists(function ($query) {
                   $query->select('commandes.produit_id')
                         ->from('commandes')
                         ->whereRaw('commandes.produit_id = produits.id');
               })
            ->join('imageproduits','imageproduits.produit_id','=','produits.id')
            ->where([['vendeur_id',$vendeur->id],['imageproduits.profile',1]])
            ->select(\DB::raw('DATE(produits.created_at) date'),'Libellé','produits.id','Qte_P','prix','image')
            ->orderBy('date','asc')
            ->take(5)->get();     
        $clientFidele = \DB::table('clients')
            ->join('commandes','commandes.client_id','=','clients.id')
            ->where([['commandes.vendeur_id',$vendeur->id],['commandes.Réponse_vendeur',0],['commandes.commande_envoyee',1]])
            ->select(\DB::raw('count(clients.id) as `nombre_client`'),'nom','prenom')
            ->groupby('clients.id','nom','prenom')
            ->orderBy('nombre_client','desc')
            ->take(10)->get();  
         $commande = \DB::table("commandes")
            ->where([['commandes.vendeur_id',$vendeur->id],['commandes.commande_envoyee',1]])
            ->select(\DB::raw('count(id) as `commande`'),\DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
           ->groupby('month','year')
           ->having('year','=',date("Y"))
           ->orderBy('month','asc')
           ->get();

        return view('statistiques_vendeur',['categorie'=>$categorie ,'categorieE'=>$categorieE,'achatParMois'=>$achatParMois,'produitPlusAcheter'=>$produitPlusAcheter,'produits'=>$produits,'villeFaitAchat'=>$villeFaitAchat,'produitsJamaisAchete'=>$produitsJamaisAchete,'clientFidele'=>$clientFidele,'commande'=>$commande]);
    }


}
