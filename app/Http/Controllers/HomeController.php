<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()    // if he is not connecter 
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->type_compte == 'c'){
            return view('profil_clinet');
        }

        if(Auth::user()->type_compte == 'v'){
            return view('profil_vendeur');
        }

        if(Auth::user()->type_compte == 'e'){
            return view('profil_employeur');
        }

        if(Auth::user()->type_compte == 'a'){
            return view('profil_admin');
        }
    }

    
}
