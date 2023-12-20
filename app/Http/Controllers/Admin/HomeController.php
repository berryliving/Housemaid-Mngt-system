<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Helper;
use App\Models\Request as ModelsRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index(Request $request)
    {
        $page = "Home";
        $auth = $request->auth;
        $helper_count = Helper::all()->count();
        $user_count = User::all()->count();
        $request_count = ModelsRequest::all()->count();
        return view('admin.home', compact('auth', 'user_count', 'page', 'helper_count', 'request_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function viewStatus(Request $request)
    {
        $page = "View Request";
        $auth = $request->auth;
        $helpers = [];
        $helper = ModelsRequest::where('status', '0')->get();
        foreach ($helper as $key) {
            $user = User::find($key->user_id);
            $aa = Helper::find($key->helper_id);
            $helpers [] = ['request' => $key, 'user' => $user, 'helper' => $aa];
        }
        return view('admin.request_status', compact('auth', 'helpers', 'page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function accept($id)
    {
        try{
            $helper = ModelsRequest::find($id);
            $helper->status = 1;
            if($helper->update()){
                return back()->with("success", 'Request accepted');
            }else{
                return back()->with("failed", 'failed to accept Helper');
            }
        }catch(Exception $e){
            return back()->with("failed", 'Saver error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * 
     */
    public function decline($id)
    {
        try{
            $helper = ModelsRequest::find($id);
            $helper->status = 2;
            if($helper->update()){
                return back()->with("success", 'Request accepted');
            }else{
                return back()->with("failed", 'failed to accept Helper');
            }
        }catch(Exception $e){
            return back()->with("failed", 'Saver error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * 
     */
    public function viewUser(Request $request)
    {
        $page = "View User";
        $auth = $request->auth;
        $users = User::all();

        return view('admin.view_user', compact('auth', 'users', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * 
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * 
     */
    public function destroy($id)
    {
        //
    }
}
