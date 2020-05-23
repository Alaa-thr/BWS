<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Route;
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
        
        $this->middleware('guest')->except('logout');

    }
    public function logout()
    {
        
            Auth::logout();
            Session::flush();
            return redirect('/accueil');
        
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

    public function username(){
        $loginType = request()->input('numTelephone');//return string "phone number" or "email" based on input form user
        $this->numTelephone = filter_var($loginType,FILTER_VALIDATE_EMAIL)? 'email' : 'numTelephone' ;// if the input is email => retur "email" else "phone number"
        request()->merge([$this->numTelephone => $loginType]);//merge[key=>value](new value) to request object
        return property_exists($this, 'numTelephone')? $this->numTelephone :'email' ;// return "phone number" or "email"
    }
    
    

}
