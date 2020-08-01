<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Auth;

class AdminController extends BaseController
{

	public function __construct()
    {
        $this->middleware('auth:admin');
    }
	
	private $data	= array(
		"folder"	=> "dashboard"
	);
	
    public function login(){
		return view('admin/admin-login');
	}
	
	public function loginPost(Request $request){
		
		$txtUsername	= $request->txtUsername;
		$txtPassword	= $request->txtPassword;
	}
	
	public function dashboard(){
		return view('admin/dashboard', $this->data);
	}
	
	public function logout(){
		Auth::guard('admin')->logout();
		return redirect("admin/");
	}
}
