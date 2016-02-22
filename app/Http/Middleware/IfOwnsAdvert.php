<?php

namespace App\Http\Middleware;

use Closure;

class IfOwnsAdvert
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $advert_id = $request->segment(2);
        if (isset($advert_id) and \Auth::user()->ownsAdvert($advert_id) == false)
        {
            //TODO Acces non autorisé
            return redirect()->back();
        }

        return $next($request);
    }
}
