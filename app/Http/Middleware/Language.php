<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;

use Illuminate\Routing\Redirector;

/*use Illuminate\Foundition\Application;*/
use Illuminate\Foundation\Application;

use App;

class Language
{



    public function __construct(Application $app, Redirector $redirector/*, Request $request*/)  {
        $this->app        = $app;
        $this->redirector = $redirector;
     

        }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
          $locale  = $request->route()->getPrefix();


          if(!array_key_exists($locale, $this->app->config->get('app.locales'))){
           
                $segments = $request->segments();

                $segments[0] = $this->app->config->get('app.fallback_locale');

                return $this->redirector->to(implode('/', $segments));
          }
          

        $this->app->setLocale($locale);

        return $next($request);
    }
}
