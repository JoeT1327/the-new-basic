<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //checking token step
        if(!$request->has('token')){
            return response()->json(["message" => "api token is required. "],401);
        }else if($request->token !== "tza"){
            return response()->json(["message" => "api token does not correct. "],401 );
        }

        //passed
        return $next($request);
    }
}
