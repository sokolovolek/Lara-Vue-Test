<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;

class AdminNotAssignedInstitution
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
        $userid = Auth::user()->id;
        $myinstitution = DB::table('public.institutions')->where('user_id','=',$userid)->first(); 
        if(!$myinstitution){
            return redirect()->route('i-admin.unassigned');
        }
        return $next($request);
    }
}
