<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\ListModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	
    	return view('user_dashboard');
        //return view('home');
    }
    public function handleAdmin()
    {
    	return view('admin_dashboard');
    	//return view('handleAdmin');
    }
    


    public function Allusers_list()
    {
    	
    	$user = DB::table('list')->get();
    	return view('Allusers_list', compact('user'));
    	
    }
    public function User_create()
    {

    	return view('User_create');
    	
    }
    public function inset_list(Request $request)
    {   
    	
    	$request->validate([
    		'name' => 'required',
    		'email' => 'required',
    		'description' => 'required'
    	]); 

    	$data = ListModel::insert(['name' => $request->name,'email' => $request->email,'description' => $request->description]);

    	return json_encode(array(
    		"statusCode"=>200
    	));
    }
    public function edit($id)
    {
    	$edit = ListModel::find($id);
    	return view('editlist', compact('edit'));
    }
    public function update_list(Request $request)
    {    

    	$id=$request->id;
    	$request->validate([
    		'name' => 'required',
    		'email' => 'required',
    		
    		'description' => 'required'
    	]); 
    	
    	$data = ListModel::find($id)->update(['name' => $request->name,'email' => $request->email,'description' => $request->description]);
    	
    	return json_encode(array(
    		"statusCode"=>200
    	));
    }
    public function delete_list(Request $request)
    {
    	$id=$request->butdelete_id;

    	$data=DB::table('list')->where('id',$id)->delete();
    	return json_encode(array(
    		"statusCode"=>200
    	));
    }

    
}
