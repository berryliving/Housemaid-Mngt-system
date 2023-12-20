<?php

namespace App\Http\Controllers\User;

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
     */
    public function index(Request $request)
    {
        $page = "Home";
        $auth = $request->auth;
        $myrequest = ModelsRequest::all()->count();
        $total_helper = Helper::all()->count();
        return view('user.home', compact('page', 'auth', 'myrequest', 'total_helper'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create(Request $request)
    {
        $auth = $request->auth;
        try{
            $data = new ModelsRequest();
            $data->user_id = $auth->id;
            $data->helper_id = $request->helper_id;
            $data->duration = $request->duration;
            $data->status = 0;

            if($data->save()){
                return back()->with("success", 'Request sent successful');
            }else{
                return back()->with("failed", 'Failed to request');
            }
        }catch(Exception $e){
            return back()->with("failed", 'Saver error '. $e->getMessage());
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function viewStatus(Request $request)
    {
        $auth = $request->auth;
        $page = "View Status";
        $helper = ModelsRequest::where('user_id', $auth->id)->get();
        $helpers = [];

        foreach ($helper as $key) {
            $a = Helper::find($key->helper_id);
            $user = User::find($key->user_id);

            $helpers [] = ["request" => $key, "helper" => $a]; 
        }

        return view('user.view_status', compact('auth', 'page', 'helpers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * 
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * 
     */
    public function edit($id)
    {
        //
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
