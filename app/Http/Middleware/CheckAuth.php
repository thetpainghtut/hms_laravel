<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuth
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
        $auth = $request->session()->get('data');
        if ($auth['group_lvl_id'] != 3 && $auth['group_lvl'] != 'HMS') {
            return redirect()->route('login.create');
        }
        return $next($request);
    }
}
