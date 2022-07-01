<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has('USER_LOGIN')){
            
        }else{
            $notifiction=array('message'=>'Access Denied','alert-type'=>'error');
            
            return back()->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')

            ->header('Pragma','no-cache')

            ->header('Expires','Sun, 02 Jan 1990 00:00:00 GMT')->with($notifiction);
        }
        return $next($request);
    }
}
