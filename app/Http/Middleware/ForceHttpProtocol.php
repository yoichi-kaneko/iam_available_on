<?php

namespace App\Http\Middleware;

use Closure;

class ForceHttpProtocol {

    public function handle($request, Closure $next)
    {
        if (!$request->secure() && env('APP_ENV') === 'production') { // 本番環境のみ常時SSL化する
            if (!empty($_SERVER["HTTP_X_FORWARDED_PROTO"]) && $_SERVER["HTTP_X_FORWARDED_PROTO"] != 'https') {
                return redirect()->secure($request->getRequestUri());
            }
        }

        return $next($request);
    }

}
