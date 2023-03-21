<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ChangeWebsite
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $url  = $request->url();
        $next = null;


        if($url)
        {
            $next = str_replace( config('app.current_url'), config('app.next_url') , $url );

            return redirect( $next , 301 );
        }

        return $next($request);
    }
}
