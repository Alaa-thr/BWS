<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Client;
use App\Vendeur;
use App\Employeur;
use App\Admin;

class Confirmation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user->type_compte == 'c'){
                $usr = Client::find($user->id);
            }
            else if($user->type_compte == 'v'){
                $usr = Vendeur::find($user->id);
            }
            else if($user->type_compte == 'e'){
                $usr = Employeur::find($user->id);
            }
            else if($user->type_compte == 'a'){
                $usr = Admin::find($user->id);
            }
            if ($user->number_confirm == null && $usr->deleted_at != null ) {

                return Response()->view('page_not_found',['categorie'=>\DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get() ,'categorieE'=>\DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get()]);
            }
            
        }
        return $next($request);
    }
}
