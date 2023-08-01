<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RemoveHostHeaderMiddleware
{

    public function handle(Request $request, Closure $next)
    {

        $domains = ['karo.school', 'new.karo.school' , '127.0.0.1'];
        if (!in_array($_SERVER['SERVER_NAME'], $domains)) {
            return response()->json('sorry hacker :)' , 403);
        }

        return $next($request);
    }
}
