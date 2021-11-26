<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BelumLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('id_pengguna')){
            return $next($request);
        }else{
            return redirect("/home")->with("message","Selamat Datang!!!");;
        }
    }
}
