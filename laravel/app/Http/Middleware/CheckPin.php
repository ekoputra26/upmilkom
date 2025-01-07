<?php

namespace App\Http\Middleware;

use Closure;

class CheckPin
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
        if ($request->session()->has('kuesioner_login')) {
            return $next($request);
          } else {
            return redirect('/kuesioner-login')->with(['message' => 'Anda belum login ke Kuesioner!']);
          }
    }
}
