<?php

namespace App\Http\Middleware;

use Closure;
use App\Client;
use App\Vendeur;
use App\Employeur;
use App\Admin;
use Auth;
use Nexmo;
class LogoutUsers
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
            if($user->number_confirm != null){
               
                $user->number_confirm = mt_rand(1000,9999);
                $user->save();
                Nexmo::message()->send([
                    'to'   => '213540844782',
                    'from' => 'Basmah.ws',
                    'text' => 'Basmah.ws code '.Auth::user()->number_confirm.'.'
                ]);
                $categorie = \DB::table('categories')->where('typeCategorie','shop')->orderBy('libelle','asc')->get();
                $categorieE = \DB::table('categories')->where('typeCategorie','emploi')->orderBy('libelle','asc')->get();
                return Response()->view('confirm_number',['categorie'=>$categorie,'categorieE'=>$categorieE]);
            }
            if ($usr->deleted_at != null) {
                Auth::logout();

                return redirect()->route('compte');
            }
            
            
        }
        return $next($request);
        
    }
}
