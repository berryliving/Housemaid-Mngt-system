<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\HomeController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Unique;

class AuthCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function login()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function register()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if($user && Hash::check($request->password, $user->password)){
            $request->session()->put('id', $user->id);

            if($user->role == '1'){
                return redirect('admin/home');
            }else{
                return redirect('user/home');
            }
        }else{
            return back()->with('failed', 'Wrong email or password');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function registerAuth(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'address' =>"required",
            'contact' =>"required",
            "name" => "required"
        ]);
        if($request->password != $request->cpassword){
            return back()->with('failed', 'Password and confirm password missmatch');
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->contact = $request->contact;
        $user->password =Hash::make($request->password);
        $user->role = 2;

        if($user->save()){
            $request->session()->put('id', $user->id);
            return view('user.home');
        }else{
            return back()->with('failed', 'failde to insert');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * 
     */
    public function logout(User $user)
    {
        Session::remove('id');
        return redirect('login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * 
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * 
     */
    public function destroy(User $user)
    {
        //
    }
    
}
