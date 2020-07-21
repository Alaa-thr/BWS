<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Client;
use App\Vendeur;
use App\Employeur;
use App\Tarif_livraison;
use App\Ville;
use App\Typechoisirvendeur;
use App\Admin;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Rules\EmailExist;
use App\Rules\NumberExist;
use App\Rules\NumCarteBancaireExist;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
      public function redirectTo(){
        if(Auth::user()->type_compte == "c"){
                return RouteServiceProvider::CLIENT;
        }
        else if(Auth::user()->type_compte == "v"){
               return RouteServiceProvider::VENDEUR;
        }
        else if(Auth::user()->type_compte == "e"){
              return  RouteServiceProvider::EMPLOYEUR;
        }
        else if(Auth::user()->type_compte == "a"){
              return  RouteServiceProvider::ADMIN;
        }
    } 
    protected function validator(array $data)
    {
        
                if($data['compte'] == 1 || $data['compte'] == ""){
                    return Validator::make($data, [
                    'nom' => ['required', 'string', 'max:30'],
                    'prenom' => ['required', 'string', 'max:30'],
                    'email' => ['required', 'string', 'email', 'max:255', new EmailExist($data['compte'])],
                    'password' => ['required', 'string', 'min:8'],
                    'ville' => ['required'],
                    'numTelephone' => ['required', 'string','regex:/0[5-7][0-9]+/',"min:10","max:10", new NumberExist($data['compte'])],
                    'compte' => ['required'],
                    'photoC' => ['required','image'],
                    
                    ]);
                }
                else if($data['compte'] == 2){
                    return Validator::make($data, [
                    'nom' => ['required', 'string', 'max:30'],
                    'prenom' => ['required', 'string', 'max:30'],
                    'email' => ['required', 'string', 'email', 'max:255' , new EmailExist($data['compte'])],
                    'password' => ['required', 'string', 'min:8'],
                    'ville' => ['required'],
                    'numTelephone' => ['required', 'string','regex:/0[5-7][0-9]+/',"min:10","max:10", new NumberExist($data['compte'])],
                    //'regex:/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/' => characters@characters.domain (characters followed by an @ sign, followed by more characters, and then a "." After the "." sign, add at least 2 letters from a to z
                    'Num_Compte_Banquaire' => ['required',  new NumCarteBancaireExist(2)], 
                    'addrsse_boutique'=> ['required'],
                    'compte' => ['required'],
                    'photoV' => ['required','image'],
                    'typeL' => ['required'],
                    ]);
                }
                else if($data['compte'] == 3){
                    return Validator::make($data, [
                    'nom' => ['required', 'string', 'max:30'],
                    'prenom' => ['required', 'string', 'max:30'],
                    'email' => ['required', 'string', 'email', 'max:255' , new EmailExist($data['compte']),'regex:/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/'],
                    'password' => ['required', 'string', 'min:8'],
                    'ville' => ['required'],
                    'numTelephone' => ['required', 'string','regex:/0[5-7][0-9]+/',"min:10","max:10", new NumberExist($data['compte'])],
                    'num_compte_banquiare' => ['required', new NumCarteBancaireExist(3)],
                    'addrsse_soct' => ['required'],
                    'compte' => ['required'],
                    'nom_societe'=> ['required'],
                    'photoE' => ['required','image'],
                    ]);
                }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
                   
          
       
                if($data['compte'] == 1){
               
                    $photoCupload = request()->file('photoC');
                    $photoCname = time() . '.' . $photoCupload->getClientOriginalExtension();
                    $photoCpath = public_path('storage/profil_image/');
                    $photoCupload->move($photoCpath,$photoCname);
                 
                        $objet_user = User::create([
                                
                                'numTelephone' => $data['numTelephone'],
                                'email' => $data['email'],
                                'type_compte' => 'c', 
                                'password' => Hash::make($data['password']),

                        ]);
                       
                        Client::create([
                            'nom' => $data['nom'],
                            'user_id' => $objet_user->id,
                            'prenom' => $data['prenom'],
                            'ville' => $data['ville'],
                            'email' => $data['email'],
                            'image' =>  $photoCname,
                     
                            'numeroTelephone' => $data['numTelephone']            
                        ]);
                        
                        return $objet_user;

                }
                else if($data['compte'] == 2){
               
                    $photoVupload = request()->file('photoV');
                    $photoVname = time() . '.' . $photoVupload->getClientOriginalExtension();
                    $photoVpath = public_path('storage/profil_image/');
                    $photoVupload->move($photoVpath,$photoVname);
                        $objet_user = User::create([
                                
                                'numTelephone' => $data['numTelephone'],
                                'email' => $data['email'],
                                'type_compte' => 'v', 
                                'password' => Hash::make($data['password']),

                        ]);
                        $objet_vendeur= Vendeur::create([
                            'nom' => $data['nom'],
                            'user_id' => $objet_user->id,
                            'prenom' => $data['prenom'],
                            'ville' => $data['ville'],
                            'email' => $data['email'],
                            'numTelephone' => $data['numTelephone'],
                            'Nom_boutique' => $data['Nom_boutique'],
                            'Num_Compte_Banquaire' => $data['Num_Compte_Banquaire'],
                            'image' =>  $photoVname,
                            'Addresse' => $data['addrsse_boutique'],        
                        ]);
                        foreach ( $data['typeL'] as $type ) {
                            
                            Typechoisirvendeur::create([
                                'vendeur_id' => $objet_vendeur->user_id,
                                'type_livraison' => $type,
                            ]);

                        }
                        return $objet_user;
                }
                else if($data['compte'] == 3){
               
                    $photoEupload = request()->file('photoE');
                    $photoEname = time() . '.' . $photoEupload->getClientOriginalExtension();
                    $photoEpath = public_path('storage/profil_image/');
                    $photoEupload->move($photoEpath,$photoEname);

                        $objet_user = User::create([
                                
                                'numTelephone' => $data['numTelephone'],
                                'email' => $data['email'],
                                'type_compte' => 'e', 
                                'password' => Hash::make($data['password']),

                        ]);
                        Employeur::create([
                            'nom' => $data['nom'],
                            'user_id' => $objet_user->id,
                            'prenom' => $data['prenom'],
                            'email' => $data['email'],
                            'num_tel' => $data['numTelephone'],
                            'address' => $data['addrsse_soct'],
                            'nom_societe' => $data['nom_societe'],
                            'num_compte_banquiare' => $data['num_compte_banquiare'],
                            'image' =>  $photoEname,
                            'ville' => $data['ville'],            

                        ]);
                        return $objet_user;
                }

    }
    public function showRegistrationForm()
    {
        $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
        $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get(); 
        return view('auth.register', ['categorie'=>$categorie,'categorieE'=>$categorieE]);
    }
}
