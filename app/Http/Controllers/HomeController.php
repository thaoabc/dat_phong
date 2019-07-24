<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\admin;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        // Kiểm tra dữ liệu nhập vào
        $rules = [
            'ten_admin' =>'required',
            'sdt' =>'required|numeric',
            'email' =>'required|email',
            'password' => 'required|min:6'
        ];
        $messages = [
            'ten_admin.required' => 'Tên admin là trường bắt buộc',
            'sdt.required' => 'Số điện thoại là trường bắt buộc',
            'sdt.numeric' => 'Viết sai số điện thoại',
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect('admin/view_insert_admin')->withErrors($validator)->withInput();
        } else {
            $admin->ten_admin=$request->input('ten_admin');
            $admin->so_dien_thoai=$request->input('sdt');
            $admin->email=$request->input('email');
            $admin->password=bcrypt($request->input('password'));
            $admin->cap_do=$request->input('cap_do');
            $admin->password_reminder_token= Str::random(60);
            $admin->save();
            return redirect()->route('view_all_admin');
        }
        
       
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

        $rules = [
            'ten_admin' =>'required',
            'sdt' =>'required',
            'email' =>'required|email',
            'password' => 'required|min:6'
        ];
        $messages = [
            'ten_admin.required' => 'Tên admin là trường bắt buộc',
            'sdt.required' => 'Số điện thoại là trường bắt buộc',
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        
        if ($validator->fails()) {
            $give_all=$request->all();
            $ma_admin=$give_all['ma_admin'];
            $b = (int)$ma_admin;
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect()->route('view_one_admin', ['ma_admin' => $b])->withErrors($validator)->withInput();
        } else {
            $give_all=$request->all();
            $admin=admin::where('ma_admin',$give_all['ma_admin'])->first();
            $admin->ten_admin=$give_all['ten_admin'];
            $admin->so_dien_thoai=$give_all['sdt'];
            $admin->email=$give_all['email'];
            $admin->password=bcrypt($give_all['password']);
            $admin->cap_do=$give_all['cap_do'];
            $admin->save();
        return redirect()->route('view_all_admin');
        }
    }

    public function delete($ma_admin)
    {   
        $admin=new admin();
        $admin->ma_admin=$ma_admin;
        admin::find($ma_admin)->delete();
        return redirect()->route('view_all_admin');
    }
}
