<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfAuth
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
        if ($auth['group_lvl_id'] == 3 && $auth['group_lvl'] == 'HMS') {
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
