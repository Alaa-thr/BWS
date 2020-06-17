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
        $this->middleware('guest')->except(['logout', 'logoutRegister','authenticate']);
    }

    public function logout()
    {        
            Auth::logout();
            Session::flush();
            return redirect('/accueil');       
    }
    
    public function logoutRegister(){
       //$typeCompte = Auth::user()->type_compte;
            Auth::logout();
            Session::flush();
            return redirect('/register');
     
    }
    protected function redirectTo()
    {
       if(Auth::user()->type_compte == "c"){
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

          $credentials = $request->only('email', 'type_compte', 'password');
          if (Auth::attempt($credentials)) {
            \Log::info('hello');
              if(Auth::user()->type_compte == "c"){
                 return redirect()->intended(url()->previous());
              }
              else if(Auth::user()->type_compte == "v"){
                return redirect()->intended(RouteServiceProvider::VENDEUR);
                 
              }
              else if(Auth::user()->type_compte == "e"){
                return redirect()->intended(RouteServiceProvider::EMPLOYEUR);

              }
              else if(Auth::user()->type_compte == "a"){
                return redirect()->intended(RouteServiceProvider::ADMIN);

              }
          }
          else{
            return $this->sendFailedLoginResponse($request->password);
          }
    }

    public function username(){
        $loginType = request()->input('numTelephone');//return string "phone number" or "email" based on input form user
        $this->numTelephone = filter_var($loginType,FILTER_VALIDATE_EMAIL)? 'email' : 'numTelephone' ;// if the input is email => retur "email" else "phone number"
        request()->merge([$this->numTelephone => $loginType]);//merge[key=>value](new value) to request object
        return property_exists($this, 'numTelephone')? $this->numTelephone :'email' ;// return "phone number" or "email"
    }
    
    

}
