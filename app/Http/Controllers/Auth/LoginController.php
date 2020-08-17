<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Route;
use Log;
use Illuminate\Http\Request;
use Redirect;
use App\Client;
use App\Admin;
use App\Vendeur;
use App\Employeur;
use DB;
use Nexmo;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except(['logout', 'logoutRegister','authenticate','login']);
    }

    public function logout()
    {        
      if(Auth::user()->type_compte == 'c'){
        \DB::table('commandes')->where([['client_id',Client::find(Auth::user()->id)->id],['commande_envoyee',0]])->delete();
      }
            Auth::logout();
            Session::flush();
            return redirect('/accueil');       
    }
    
    public function logoutRegister(){
      if(Auth::user()->type_compte == 'c'){
        \DB::table('commandes')->where([['client_id',Client::find(Auth::user()->id)->id],['commande_envoyee',0]])->delete();
      }
            Auth::logout();
            Session::flush();
            return redirect('/register');
     
    }

    public function login(Request $request) {
      $this->validateLogin($request);

      if ($this->hasTooManyLoginAttempts($request)) { 

          $this->fireLockoutEvent($request);
          return $this->sendLockoutResponse($request);
      }

      if ($this->guard()->validate($this->credentials($request))) {
          $user = $this->guard()->getLastAttempted();

        
            if (Auth::attempt(['email' => $request->input('numTelephone'), 'password' => $request->input('password')])) {
              if(Auth::user()->number_confirm != null){

                $user->number_confirm = mt_rand(1000,9999);
                $user->save();
                Nexmo::message()->send([
                    'to'   => '213540844782',
                    'from' => 'Basmah.ws',
                    'text' => 'Basmah.ws code '.Auth::user()->number_confirm.'.'
                ]);
                $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
                $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
                return view('confirm_number',['categorie'=>$categorie,'categorieE'=>$categorieE]);
              }
              else{
                if((Auth::user()->type_compte == "c" && Client::find(Auth::user()->id)->deleted_at == null)|| (Auth::user()->type_compte == "v" && Vendeur::find(Auth::user()->id)->deleted_at == null) || (Auth::user()->type_compte == "e" && Employeur::find(Auth::user()->id)->deleted_at == null) || (Auth::user()->type_compte == "a" && Admin::find(Auth::user()->id)->deleted_at == null)){
                  return $this->sendLoginResponse($request);
                }
                else{
                  Auth::logout();
                  Session::flush();
                  return redirect()->route('compte');
                }
              }
              
              
            }
          
          
      }
      $this->incrementLoginAttempts($request);

      return $this->sendFailedLoginResponse($request);
    }

    protected function redirectTo()
    {
      
      
        if(Auth::user()->type_compte == "c" && strpos(url()->previous(), 'compte')){
                return RouteServiceProvider::HOME;
        }
        else if(Auth::user()->type_compte == "c" && !strpos(url()->previous(), 'compte')){
                return url()->previous();
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


    public function authenticate(Request $request)
    { 
           $request->validate([
             'password' => ['required'],
             'type_compte' => ['required'],
         ]);

          //$credentials = $request->only('numTelephone','type_compte','password');
          
          if (Auth::attempt(['email' => $request->input('numTelephone'), 'password' => $request->input('password'), 'type_compte' => $request->input('type_compte')])) {
              if(Auth::user()->number_confirm != null){
                  $user = Auth::user();
                $user->number_confirm = mt_rand(1000,9999);
                $user->save();
                 Nexmo::message()->send([
                    'to'   => '213540844782',
                    'from' => 'Basmah.ws',
                    'text' => 'Basmah.ws code '.Auth::user()->number_confirm.'.'
                ]);
                $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
                $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
                return view('confirm_number',['categorie'=>$categorie,'categorieE'=>$categorieE]);
              }
              else{
                if(Auth::user()->type_compte == "c" && Client::find(Auth::user()->id)->deleted_at == null){
                 return redirect()->intended(url()->previous());
                }
                else if(Auth::user()->type_compte == "v" && Vendeur::find(Auth::user()->id)->deleted_at == null ){
                  return redirect()->intended(RouteServiceProvider::VENDEUR);
                   
                }
                else if(Auth::user()->type_compte == "e" && Employeur::find(Auth::user()->id)->deleted_at == null ){
                  return redirect()->intended(RouteServiceProvider::EMPLOYEUR);

                }
                else if(Auth::user()->type_compte == "a" && Admin::find(Auth::user()->id)->deleted_at == null){
                  return redirect()->intended(RouteServiceProvider::ADMIN);

                }
                else{
                   Auth::logout();
                   Session::flush();
                   return redirect()->route('compte');
                }
              }
              
          }
          else{
            return $this->sendFailedLoginResponse($request);
          }
    }

    public function username(){
        $loginType = request()->input('numTelephone');//return string "phone number" or "email" based on input form user
        $this->numTelephone = filter_var($loginType,FILTER_VALIDATE_EMAIL)? 'email' : 'numTelephone' ;// if the input is email => retur "email" else "phone number"
        request()->merge([$this->numTelephone => $loginType]);//merge[key=>value](new value) to request object
        return property_exists($this, 'numTelephone')? $this->numTelephone :'email' ;// return "phone number" or "email"
    }
    
    

}
