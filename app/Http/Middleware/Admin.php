<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
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
        if($request->session()->has('ADMIN_LOGIN')){
            return redirect('admin/dashboard'); 
        }else{
            $notifiction=array('message'=>'Access Denied','alert-type'=>'error');
            return back()->with($notifiction);
        }
        return $next($request);
    }
}
