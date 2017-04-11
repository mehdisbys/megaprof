<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Session;
class PreventBackHistory
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
        $response = $next($request);

        $advert_id = session('advert_id') ?? $request->input('advert_id');

        if($advert_id == NULL)
        {
            return redirect('/mon-compte');
        }
        return $response;
    }
}