<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Admin;
use App\Vendeur;
use App\Client;
use App\Employeur;
use App\Article;
use App\User;
use App\Categorie;
use App\Sous_categorie;
use App\SousCategorie;
use App\Typechoisirvendeur;
use Auth;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Rules\ModifieTextDescriptionArticle;
use Illuminate\Support\Facades\Hash;
use App\Rules\NumberExist;
use App\Rules\EmailExist;
use App\Rules\NumCarteBancaireExist;
>>>>>>> 36f9fd2f3b4d7854deaf97da4195c3f9a79ef164
class AdminController extends Controller
{
     public function profil_admin(){
        $admin=Admin::find(Auth::user()->id); 
        return view('profil_admin',['admin'=>$admin]);
    }
    public function vendeur_admin(){
        $vendeur =Vendeur::where('deletedv',0)->paginate(10);

        return view('vendeur_admin',['vendeur'=>$vendeur]);
    }

    public function client_admin(){
        $client =Client::where('deletedc',0)->paginate(10);
        return view('client_admin',['client'=>$client]);
    }

    public function employeur_admin(){
        $employeur = Employeur::where('deletede',0)->paginate(10); 
        return view('employeur_admin',['employeur'=>$employeur]);
    }

    public function admin_admin(){
        $admin = Admin::where('deleteda',0)->paginate(10);  
        return view('admin_admin',['admin'=>$admin]);
    }
    public function recup_vendeur(){
        $vendeur_recup = Vendeur::where('deletedv',1)->paginate(10);
        return view('recup_vendeur',['vendeur_recu'=>$vendeur_recup]);
    }
    public function recup_client(){
        $client_recup = Client::where('deletedc',1)->paginate(10);
        return view('recup_client',['client_recu'=>$client_recup]);
   }
   public function recu_employeur(){
       $employeur_recup = Employeur::where('deletede',1)->paginate(10);
        return view('recu_employeur',['employeur_recu'=>$employeur_recup]);
   
   }
   public function recup_admin(){
       $admin_recup = Admin::where('deleteda',1)->paginate(10);
        return view('recup_admin',['admin_recu'=>$admin_recup]);
   
   }

    public function article_admin(){//fcnt qui retourné tout les articles qui sont dans la table "Article" et trie par ordre desc selon son dates de creations
        $c = Admin::find(Auth::user()->id);//recuperé "user_id" de admin qui est connecter       
        $article = \DB::table('articles')->where('admin_id', $c->id)->orderBy('created_at','desc')->paginate(5) ;//recuperé les articles qui sont dans la table "Article" et trie par ordre desc selon son dates de creations et pour "->paginate(5)" c a d f kol page t'affichilek 5 ta3 les article  
        return view('articles_admin',['article'=>$article, 'idAdmin' => $c->id]);//reteurné a la view "articles_admin" et les 2 attributs "article" (contient tout les articles) et "idAdmin" (id de l'admin cncté) 
    }

    public function detaillsArticle(Request $request){//fcnt retourné l'article di rena habin n2affichiw les détaills te3o, 3anda un parametre di fih id ta3 article rechercher
        $article_detaills = \DB::table('articles')->where('id', $request->idA)->get();
        return  $article_detaills;
    }

    public function addArticle(ArticleRequest $request){//fcnt pour ajouter un article tretourni un attributs "etat"(le cas di l'ajout yesra nichan c a d pas d'erreur) et "articleAjout"(article di ajoutinah) w 3andha un parametre "$request" di fih les info ta3 article di rena habin n2ajoutiwah et de type "ArticleRequest"(ArticleRequest est un request tejebrouh f "app/http/Requests" fayda te3o => ytestilna les info di rena 7abin n2ajoutiwhom ida yetmechaw 3la 7sab les regles tawa3na ou nn(si oui y ajouti w ykml khademto, sinon yretourni des erreur)) 

       // \Log::info($request->all());
    /***********************KI TEWESLO HNA HADRO M3AYA BACH NFAHEMKM ***************************/
                $exploded = explode(',', $request->image);
                $decoded = base64_decode($exploded[1]);//Décode une chaîne en MIME base64
                if(str_contains($exploded[0], 'jpeg')){
                    $extension = 'jpg';
                }
                else{
                    $extension = 'png';
                }
                $fileName = str_random().'.'.$extension;
                Storage::put('/public/articles_image/' . $fileName, $decoded);
    /*******************************************************************************************/         
                $article2 = new Article;
                $article2->titre = $request->titre;
                $article2->description = $request->description;
                $article2->admin_id = $request->admin_id;
                $article2->image = $fileName;
                $article2->save();
                return Response()->json(['etat' => true,'articleAjout' => $article2]);
    }

    public function deleteArticle($id){//fnct pour supprimer un article di 3ando un parametre di hoda id ta3 article di nssuprimiwah w tretourni un attributs "etat"(ida kan = true => la supprision n3amlt ghaya)
        $article = Article::find($id);//n7awes 3la l article di rena habin nsupprimiwah
        $article->delete();
        return Response()->json(['etat' => true]);
    }

    public function updateArticleButton(Request $request){//fct pour modifie un article, 3andha un parametre di fih les info modifier ta3 article di rena 7abin nmodifiwah, w tretouni 2 attributs "etat" et "articleAjout"(article di modifyinah) 

        $request->validate([//hna nvirifyiw ida les info di dakhelhom f les inputs w ra hab Aybedelhom f article yrespictiw les regles tawa3na ou nn(si oui yakhdem nichan, sinon yred des erreur di yenstokaw f tableau 'message')
             'titre' => [new ModifieTextDescriptionArticle($request->id),'regex:/^[a-z0-9A-Z][a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],//"new ModifieTextDescriptionArticle($request->id)"(appele l constructeur de Rule "ModifieTextDescriptionArticle" di tejebrouha f "app/Rules" w ta3tilo un parametre di fih id ta3 article)
             'description' => [new ModifieTextDescriptionArticle($request->id),'regex:/^[a-z0-9A-Z][a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
         ]);
        $article2 = Article::find($request->id);
            
        if($article2->image == $request->image){//hadi f le cas di maykounch modifya l'image
            $article2->image = $request->image;
        }
        else{                   // ki ykoun modifya l'image
            $exploded = explode(',', $request->image);
            $decoded = base64_decode($exploded[1]);
            if(str_contains($exploded[0], 'jpeg')){
                $extension = 'jpg';
            }
            else{
                $extension = 'png';
            }
            $fileName = str_random().'.'.$extension;
            Storage::put('/public/articles_image/' . $fileName, $decoded);
            $article2->image = $fileName;
        }
        $article2->titre = $request->titre;
        $article2->description = $request->description;
        $article2->admin_id = $request->admin_id;           
        $article2->save();
        return Response()->json(['etat' => true,'articleAjout' => $article2]);
    
    }

    public function update_profil(Request $request, $id) {
                

        $admin = Admin::find(Auth::user()->id);
        $user = User::find(Auth::user()->id);

        $admin->nom = $request->input('nom');
        $admin->prenom = $request->input('prenom');
        $admin->numTelephone = $request->input('num');
        $admin->email = $request->input('adresse_email'); 
        $admin->numCarteBanquaire = $request->input('bnq');
     
        $user->numTelephone = $request->input('num');
        $user->email = $request->input('adresse_email');  
        
        $admin->save();
        $user->save();
       
        return redirect('profilAdmin');
    }
    public function categories_admin(){
        $categorie = \DB::table('categories')->orderBy('created_at','desc')->get();
        return view('categories_admin',['categorie'=>$categorie]);
    }
        
    public function addCategorie(Request $request){
        $categorie = new Categorie;

        $categorie->libelle = $request->libelle;

        $categorie->save();

        return Response()->json(['etat' => true, 'categorie' => $categorie]);
    }
    public function updateCategorie(Request $request){
        $categorie = Categorie::find($request->id);

        $categorie->libellé = $request->libellé;

        $categorie->save();

        return Response()->json(['etat' => true]);
    
    }

    public function deleteCategorie($id){
        $categorie = Categorie::find($id);
        $categorie->delete();
     return Response()->json(['etat' => true]);
    }

    public function getSousCategories(){
        $sousCatego = Sous_categorie::all();
        return $sousCatego;
    }

    public function addSousCategorie(Request $request){

        $sousCategorie = new Sous_categorie();
        $sousCategorie->libelle = $request->libelle;
        $sousCategorie->categorie_id = $request->categorie_id;
        $sousCategorie->save();
        return Response()->json(['etat' => true,'sousCategorieAjout' => $sousCategorie]);
    }

    public function detailsVendeur(Request $request){
        $vendeur_detaills = \DB::table('vendeurs')->where('id', $request->idV)->get();
        return  $vendeur_detaills;
    }
    public function detailsClient(Request $request){
        $client_detaills = \DB::table('clients')->where('id', $request->idC)->get();
        return  $client_detaills;
    }
    public function detailsEmployeur(Request $request){
        $employeur_detaills = \DB::table('employeurs')->where('id', $request->idE)->get();
        return  $employeur_detaills;
    }
    public function detailsAdmin(Request $request){
        $admin_detaills = \DB::table('admins')->where('id', $request->idAD)->get();
        return  $admin_detaills;
    }

    public function deleteVendeur($id){
     
        $vendeur = Vendeur::where('id',$id)->update(['deletedv' => 1]);
        return Response()->json(['etat' => true]);
        
    }
    public function deleteClient($id){
        
        $client = Client::where('id',$id)->update(['deletedc' => 1]);
        return Response()->json(['etat' => true]);
    }
    public function deleteEmployeur($id){
        
        $employeur = Employeur::where('id',$id)->update(['deletede' => 1]);
        return Response()->json(['etat' => true]);
    }
    public function deleteAdmin($id){
        
        $admin = Admin::where('id',$id)->update(['deleteda' => 1]);
        return Response()->json(['etat' => true]);
    }
    public function recupConfirmer($id){
        $vendeur = Vendeur::where('id',$id)->update(['deletedv' => 0]);
        return Response()->json(['etat' => true]);   
    }
    public function recupConfirmerc($id){
       $client = Client::where('id',$id)->update(['deletedc' => 0]);
        return Response()->json(['etat' => true]);   
        
    }
    public function recupConfirmere($id){
        $employeur = Employeur::where('id',$id)->update(['deletede' => 0]);
        return Response()->json(['etat' => true]);   
          
    }
    public function recupConfirmera($id){
       $admin = Admin::where('id',$id)->update(['deleteda' => 0]);
        return Response()->json(['etat' => true]);   
          
    }
    public function addAdmin(Request $request){
        $request->validate([
                'numTelephone' =>  ['required', 'string','regex:/^0[5-7][0-9]+/',"min:10","max:10", new NumberExist(4)],
                'email' =>['required', 'string', 'email', 'max:40', new EmailExist(4)],
                'mtps' =>['required', 'string', 'min:8'],
                'nom' =>['required','regex:/[A-Z-0-9][a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                'prenom' =>['required','regex:/[A-Z-0-9][a-z0-9A-Z,."_éçè!?$àâ(){}]+/'],
                'type' =>['required'],
                'image' =>['required'],
                'numCarteBanquaire' =>['required', new NumCarteBancaireExist(4)],
        ]);

         $exploded = explode(',', $request->image);
         $decoded = base64_decode($exploded[1]);//Décode une chaîne en MIME base64
         if(str_contains($exploded[0], 'jpeg')){
            $extension = 'jpg';
         }
         else{
            $extension = 'png';
         }
         $fileName = str_random().'.'.$extension;
         Storage::put('/public/profil_image/' . $fileName, $decoded);
         $admin2 = new Admin;
         $user = new User;
         $user->numTelephone = $request->numTelephone;
         $user->email = $request->email;
         $user->password = Hash::make($request->mtps);
         $user->type_compte = 'a';
         $user->save();
         $admin2->nom = $request->nom;
         $admin2->prenom = $request->prenom;
         $admin2->user_id = $user->id;
         $admin2->email = $request->email;
         if($request->type == '2'){
                $admin2->big_admin = 0;
         }
         else{
            $admin2->big_admin = $request->type;
         }
         
         $admin2->numTelephone = $request->numTelephone;
         $admin2->numCarteBanquaire = $request->numCarteBanquaire;
         $admin2->image = $fileName;
         
         $admin2->save();
         return Response()->json(['etat' => true,'adminAjout' => $admin2]);
    }


}
