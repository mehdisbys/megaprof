<?php

namespace App\Http\Middleware;

use Closure;

class AfterAdvert
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
        $response = $next($request);

        $original = $response->getOriginalContent();

        $config = \Config::get("adverts.{$original->getMethod()}");

        switch ($config['action']) {
            case 'view' :
                return view($config['view']['create'])
                    ->with($original->getArgs() + $config['args']);

            case 'redirect':
                return redirect()->action($config['next'], $original->getArgs());
        }

    }
}
