<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App;
use Session;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        if ($locale = $request->get('lang')) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        } else {
            App::setLocale(Session::get('locale', config('app.locale')));
        }

        return $next($request);
    }
}
