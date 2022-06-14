<?php


namespace App\Http\Middleware;


use Closure;

class PWLMiddleware
{
    public function handle($request, Closure $next)
    {
        if (session('token', null)=== null) {
            return redirect(route('login.index'));
        }
        $request->token = session('token');
        return $next($request);
    }
}
