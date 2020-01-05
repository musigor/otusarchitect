<?php

namespace App\Http\Middleware;

use Closure;

class FrontendAuthenticate
{
    /**
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle($request, Closure $next)
    {
        $userId = $request->session()->get('user_id', null);

        if ($userId === null) {
            return redirect('login');
        }

        return $next($request);
    }
}
