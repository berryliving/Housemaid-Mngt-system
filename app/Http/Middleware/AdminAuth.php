<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminAuth
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
        if(!Session::has('id')){
            return redirect('login')->with('failed', 'Please login first');;
        }

        $auth = User::find(Session::get('id'));
        if(!$auth){
            return redirect('login')->with('failed', 'Please login first');
        }

        if($auth->role != '1'){
            return redirect('login')->with('failed', 'Please login first');;
        }

        $request->merge(['auth' => $auth]);
        return $next($request);
    }
}
