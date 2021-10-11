<?php
namespace App\Http\Middleware;
use Closure;
class SetLocale
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
        $desiredLocale = $request->segment(1);
        $locale = locale()->isSupported($desiredLocale) ? $desiredLocale : locale()->fallback();
        
        locale()->set($locale);
        return $next($request);
    }
}