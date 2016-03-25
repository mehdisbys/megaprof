<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

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
                return $response->setContent(view($config['view']['create'])
                    ->with($original->getArgs() + $config['args']));

            case 'redirect':
                $request->session()->put($original->getArgs());
                return dd(redirect()->guest('/login'));


                return redirect()->action($config['next']);
        }

    }
}
