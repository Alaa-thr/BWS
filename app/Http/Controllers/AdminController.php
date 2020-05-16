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
use App\SousCategorie;
use Auth;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Rules\ModifieTextDescriptionArticle;

class AdminController extends Controller
{
     public function profil_admin(){
        $admin=Admin::find(Auth::user()->id); 
        return view('profil_admin',['admin'=>$admin]);
    }

    public function vendeur_admin(){
        $vendeur = Vendeur::all(); 
        return view('vendeur_admin',['vendeur'=>$vendeur]);
    }

    public function client_admin(){
        $client = Client::all(); 
        return view('client_admin',['client'=>$client]);
    }

    public function employeur_admin(){
        $employeur = Employeur::all(); 
        return view('employeur_admin',['employeur'=>$employeur]);
    }

    public function admin_admin(){
        $admin = Admin::all(); 
        return view('admin_admin',['admin'=>$admin]);
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
        $cat = Categorie::all();
        $nabil = \DB::table('categories')->orderBy('created_at','desc')->get();
        return view('categories_admin',['categorie'=>$nabil]);
    }
        
    public function addCategorie(Request $request){
        $categorie = new Categorie;

        $categorie->libellé = $request->libellé;

        $categorie->save();

        return Response()->json(['etat' => true, 'id' => $categorie]);
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

     return Response()->json(['etat' => true, 'id' => $categorie]);
    }
    public function sousCategories(){
        $scat = SousCategorie::all();
        echo "$scat";
        return $scat;
    }
   
   


}
