<?php

namespace App\Http\Controllers;

use App\Models\Helper;
use App\Models\Request as ModelsRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index(Request $request)
    {
        $auth = $request->auth;
        $helper = Helper::all();
        $page = "View Helper";
        if($auth->role == '1'){
            return view('admin.view_helper', compact('auth', 'helper', 'page'));
        }else{
            $helper = DB::table('helpers')
                        ->whereNotExists(function ($query) {
                            $query->select(DB::raw(1))
                                ->from('requests')
                                ->where('status', '=', 1)
                                ->whereColumn('helpers.id', '=', 'requests.helper_id');
                        })
                        ->get();

            return view('user.view_helper', compact('auth', 'helper', 'page'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function addView(Request $request)
    {
        $auth = $request->auth;
        $helper = Helper::all();
        $page = "Add Helper";
        return view('admin.add_helper', compact('auth', 'helper', 'page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:helpers',
            'age' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'experience' => 'required',
        ]);

        try{
            $helper = new Helper();
            $helper->name = $request->name;
            $helper->age = $request->age;
            $helper->gender = $request->gender;
            $helper->address = $request->address;
            $helper->contact = $request->contact;
            $helper->experience = $request->experience;

            if($helper->save()){
                return back()->with("success", 'New Helper added successfull');
            }else{
                return back()->with("failed", 'failed to add new Helper');
            }
        }catch(Exception $e){
            return back()->with("failed", 'Saver error '. $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * 
     */
    public function requestView(Request $request, $id)
    {
        $page = "Request Helper";
        $auth = $request->auth;
        $helper = Helper::find($id);
        return view("user.request_helper", compact('page', 'auth', 'helper'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * 
     */
    public function editView(Request $request, $id)
    {
        $page = "Edit Helper";
        $auth = $request->auth;
        $helper = Helper::find($id);
        return view("admin.edit_helper", compact('page', 'auth', 'helper'));
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
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'experience' => 'required',
        ]);

        try{
            $helper = Helper::find($id);
            $helper->name = $request->name;
            $helper->age = $request->age;
            $helper->gender = $request->gender;
            $helper->address = $request->address;
            $helper->contact = $request->contact;
            $helper->experience = $request->experience;

            if($helper->update()){
                return back()->with("success", 'Helper profile updated');
            }else{
                return back()->with("failed", 'failed to update Helper');
            }
        }catch(Exception $e){
            return back()->with("failed", 'Saver error '. $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * 
     */
    public function destroy($id)
    {
        try{
            $user = Helper::find($id);
            $request = ModelsRequest::where('helper_id', $id);

            if($user->delete() && $request->delete()){
                return back()->with("success", 'deleted successfull');
            }else{
                return back()->with("failed", 'failed to delete Helper');
            }
        }catch(Exception $e){
            return back()->with("failed", 'Saver error');
        }
    }
}
