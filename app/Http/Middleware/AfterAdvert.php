<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\Debug\Exception\FatalThrowableError;

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

        if($response instanceof RedirectResponse)
        {
            return $response;
        }

        $original = $response->getOriginalContent();

        $config = \Config::get("adverts.{$original->getMethod()}");

        switch ($config['action']) {
            case 'view' :
                return $response->setContent(view($config['view']['create'])
                    ->with($original->getArgs() + $config['args']));

            case 'redirect':
                $request->session()->put($original->getArgs());
                return redirect()->action($config['next']);
        }

    }
}
