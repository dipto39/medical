<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class hcheck
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
        if(session()->has('name')){
            if(session()->get('type') == 2){

            }else{
                return redirect()->back();
            }
        }else{
            return redirect('/');
        }

        return $next($request);
    }
}
