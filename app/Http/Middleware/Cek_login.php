<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cek_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect('login');
        }
    //    simpan data user pada variabel $user
        $user = Auth::user();

    //    jika user memiliki level sesuai pada kolom pada lanjutkan request
        if($user->level == $roles){
            return $next($request);
        }
        
    //    jika tidak memiliki akses maka kembalikan ke halaman login
        return redirect('login')->with('error','Maaf anda tidak memiliki akses');
    }
}
