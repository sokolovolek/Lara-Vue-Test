<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use DB;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            // if institution admin
            if(Auth::user()->hasRole('iadmin')){
                $userid = Auth::user()->id;
                $myinstitution = DB::table('public.institutions')->where('user_id','=',$userid)->first(); 
                if(!$myinstitution){
                    // $this->redirect()->route('/i-admin.unassigned');
                  return  redirect('/admin/unassigned'); 
                }
                //else redirect to correct admin home page
                // $this->redirect()->route('i-admin.home'); 
               return redirect('/admin/home'); 
            }

            // if superdmin
            if(Auth::user()->hasRole('sadmin')){
                // $this->redirect()->route('super_admin.home');
              return  redirect('/superadmin/home'); 
            }

            // if employer

            if(Auth::user()->hasRole('employer')){
               return redirect()->route('employer.home.index');
            }

            // return default

            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
