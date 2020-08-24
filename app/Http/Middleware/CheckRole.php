<?php

namespace CorporacionPeru\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$roles)
    {
        
        // (! $request->user()->authorizeRoles($roles)){
        if (! $request->user()->hasAnyRole($roles)) {
            return redirect('home');
        }
        return $next($request);
    }
}
