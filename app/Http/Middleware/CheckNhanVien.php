<?php

namespace App\Http\Middleware;

use Closure;

use  Session;

use Illuminate\Support\Facades\Auth;

class CheckNhanVien
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
        if (Auth::check()&& (Session::get('cap_do'))==2) {
           return redirect('/nhan_vien/dat_phong');
        }
        return redirect()->route('login');
    }
}
