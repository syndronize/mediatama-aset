<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SudahLogin
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
        if(session()->has('id_pengguna')){
            return $next($request);
        }else{
            return redirect("/")->with("pesan", "Anda Belum Login");
        }
    }
}
