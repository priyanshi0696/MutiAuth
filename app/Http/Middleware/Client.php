<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class Client
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
          if(!Auth::check()){
            return redirect('/login');
        }
        $user=Auth::user();
        if($user->role==5){
            return $next($request);
        }

        if($user->role==2){
            return redirect('/admin');
        }

        if($user->role==3){
            return redirect('/depthead');
        }

        if($user->role==4){
            return redirect('/staff');
        }

        if($user->role==1){
            return redirect('/superadmin');
        }

    }
}
