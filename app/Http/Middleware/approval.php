<?php

namespace App\Http\Middleware;

use App\Models\doctor;
use App\Models\hospital;
use Closure;
use Illuminate\Http\Request;

class approval
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
        $table=hospital::where(['hid' => session()->get('uid'),'hstatus' => 0])->get();
        if(count($table) > 0){
            session()->flash("error","Please Wait for Admin approval");
            return redirect('/hospital/profile');
        }else{
            $table2=hospital::where(['hid' => session()->get('uid'),'hstatus' => 2])->get();
            if(count($table2) > 0){
                session()->flash("block","You are blocked.Please contact to Admin.");
                return redirect('/hospital/profile');
            }else{

            }
        }
        return $next($request);
    }
}
