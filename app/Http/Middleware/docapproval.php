<?php

namespace App\Http\Middleware;

use App\Models\doctor;
use Closure;
use Illuminate\Http\Request;

class docapproval
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
        $table=doctor::where(['did'=> session()->get('uid'),'status' => 0])->get();
        if(count($table) > 0){
            session()->flash("error","Please Wait for Admin approval");
            return redirect('/doctor/profile');
        }else{
            $table2=doctor::where(['did' => session()->get('uid'),'status' => 2])->get();

            if(count($table2) > 0){
                session()->flash("block","You are blocked.Please contact to Admin.");
                return redirect('/doctor/profile');
            }else{

            }
        }
        return $next($request);
    }
}
