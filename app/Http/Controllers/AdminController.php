<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Model\admin;

/**
 * 
 */
class AdminController extends BaseController
{
	
	public function login()
	{	
		return view('login');
	}

	public function process_login()
	{	
		// $admin=new admin();
		// $admin->password=Request::get('password');
		// $admin->email=Request::get('email');
		// $admin=$admin->process_login();
		// if ($admin==1) {
		// 	$action=$admin->cap_do();
		// 	if ($action==1){
		// 		return redirect()->route('view_all_admin');
		// 	}
		// }
		// else{
		// 	return view('login');
		// }
	}

	public function view_all()
	{	
		$array_admin=admin::all();
		return view('admin.view_all',['array_admin'=>$array_admin]);
	}

	public function view_insert()
	{
		return view('admin.view_insert');
	}

	public function process_insert(Request $request)
	{	
		$admin=new admin();
		$q=Str::random(60);
		$admin->ten_admin=$request->input('ten_admin');
		$admin->so_dien_thoai=$request->input('sdt');
		$admin->email=$request->input('email');
		$admin->password=bcrypt($request->input('password'));
		$admin->cap_do=$request->input('cap_do');
		$admin->password_reminder_token= Str::random(60);
		$admin->save();
		return redirect()->route('view_all_admin');
	}

	public function view_one($ma_admin)
	{	
		$admin=new admin();
		$admin->ma_admin=$ma_admin;
		$admin=admin::where('ma_admin',$ma_admin)->first();
		return view('admin.view_one',['admin'=>$admin]);
	}

	public function update(Request $request)
	{	
		$admin=new admin();
		$give_all=$request->all();
		$admin=admin::where('ma_admin',$give_all['ma_admin'])->first();
		$admin->ten_admin=$give_all['ten_admin'];
		$admin->so_dien_thoai=$give_all['sdt'];
		$admin->email=$give_all['email'];
		$admin->password=$give_all['password'];
		$admin->cap_do=$give_all['cap_do'];
		$admin->save();
		return redirect()->route('view_all_admin');
	}

	public function delete($ma_admin)
	{	
		$admin=new admin();
		$admin->ma_admin=$ma_admin;
		admin::find($ma_admin)->delete();
		return redirect()->route('view_all_admin');
	}
}