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
use App \Typechoisirvendeur;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
    protected function validator(array $data)
    {
        if($data['compte'] == 1){
            return Validator::make($data, [
            'nom' => ['required', 'string', 'max:30'],
            'prenom' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'ville' => ['required'],
            'numTelephone' => ['required', 'string','regex:/0[5-7]/',"min:10","max:10"],
            ]);
        }
        else if($data['compte'] == 2){
            return Validator::make($data, [
            'nom' => ['required', 'string', 'max:30'],
            'prenom' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'ville' => ['required'],
            'numTelephone' => ['required', 'string','regex:/0[5-7]/',"min:10","max:10"],
            'Num_Compte_Banquaire' => ['required'], 
            'addrsse_boutique'=> ['required'],
            'compte' => ['required'],


            ]);
        }
        else if($data['compte'] == 3){
            return Validator::make($data, [
            'nom' => ['required', 'string', 'max:30'],
            'prenom' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'ville' => ['required'],
            'numTelephone' => ['required', 'string','regex:/0[5-7]/',"min:10","max:10"],
            'num_compte_banquiare' => ['required'],
            'addrsse_soct' => ['required'],
            'compte' => ['required'],
            'nom_societe'=> ['required'],
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
        $i=0;
        if($data['compte'] == 1){
       
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
                    'numeroTelephone' => $data['numTelephone']            
                ]);
                return $objet_user;

        }
        else if($data['compte'] == 2){
       
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
                    'email' => $data['email'],
                    'numTelephone' => $data['numTelephone'],
                    
                    'Nom_boutique' => $data['Nom_boutique'],
                    'Num_Compte_Banquaire' => $data['Num_Compte_Banquaire'],
                    'image' => $data['photoV'],   
                    'Addresse' => $data['addrsse_boutique'],        
                ]);
                foreach ( $data['typeL'] as $type ) {
                    
                    Typechoisirvendeur::create([
                        'vendeur_id' => $objet_vendeur->user_id,
                        'type_livraison' => $type,
                    ]);
                    if($type == "vc"){
                        $i++;
                    }
                }
                if($i!=0){
                    foreach ($data['villeC'] as $ville) {
                        Tarif_livraison::create([
                            'ville_id' => Ville::find($ville)->id,
                            'vendeur_id' => $objet_vendeur->user_id,
                            'prix' => $data['prix_tarif'],
                        ]);
                    }
                    
                }
                return $objet_user;
        }
        else if($data['compte'] == 3){
       
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
                    'image' => $data['photoE'],            
                ]);
                return $objet_user;
        }
    }
}
