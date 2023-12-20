<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserAuth
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
            return redirect('login');
        }

        $auth = User::find(Session::get('id'));
        if(!$auth){
            return redirect('login');
        }

        if($auth->role != '2'){
            return redirect('login');
        }

        $request->merge(['auth' => $auth]);
        return $next($request);
    }
}
