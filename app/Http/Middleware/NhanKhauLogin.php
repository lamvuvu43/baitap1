<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class NhanKhauLogin
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
        if(Auth::guard('nhan_khau_login')->check()){
            return $next($request);
        }else{
            return redirect()->route('login')->with('no_permision','Bạn không quyền');
        }
       
    }
}
