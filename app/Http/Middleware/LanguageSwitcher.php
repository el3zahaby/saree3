<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;

class LanguageSwitcher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param \Illuminate\Foundation\Application $app
     * @return mixed
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle($request, Closure $next)
    {
        if ($request->header('Content-Language')){
            $locale = $request->header('Content-Language');
            $this->app->setLocale($locale);
        }else{
            $lang = \Session::has('locale') ? \Session::get('locale') : \Config::get('app.locale');
            $this->app->setLocale($lang);
        }
        return $next($request);
    }
}
