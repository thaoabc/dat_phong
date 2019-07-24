<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\Phong;
use App\Model\loai_phong;

class PhongController extends Controller
{
    public function view_all()
    {
        $phong=new Phong();
        $array_phong= $phong->view_all();
    	return view('phong.view_all',['array_phong'=>$array_phong,]);
    }

    public function view_insert()
    {	
         $array_loai_phong=loai_phong::all();
    	return view('phong.view_insert',[
            'array_loai_phong'=>$array_loai_phong]);
    }

    public function process_insert_phong(Request $request)
    {   
        $phong=new phong();
        $rules = [
            'ten_phong' =>'required'
        ];
        $messages = [
            'ten_phong.required' => 'Tên phòng là trường bắt buộc',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect('phong/view_insert_phong')->withErrors($validator)->withInput();
        } else {
            $phong->ma_loai_phong=$request->input('ma_loai_phong');
            $phong->ten_phong=$request->input('ten_phong');
            $phong->tinh_trang=1;
            $phong->save();
            return redirect()->route('view_all_phong');
        }
    }

     public function view_one($ma_phong)
    {   
        $phong = Phong::where('ma_phong',$ma_phong)->first();

        $array_phong = Phong::get();
        
        $array_loai_phong=loai_phong::all();
        // dd($array_phong);
        return view("phong.view_one",[
            'phong'=>$phong,
            'array_loai_phong'=>$array_loai_phong,
            'array_phong'=>$array_phong
        ]);
    }

   public function update(Request $request)
    {   
        $phong=new phong();
        $rules = [
            'ten_phong' =>'required'
        ];
        $messages = [
            'ten_phong.required' => 'Tên phòng là trường bắt buộc',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        
        if ($validator->fails()) {
            $give_all=$request->all();
            $ma_phong=$give_all['ma_phong'];
            $b = (int)$ma_phong;
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect()->route('view_one_phong', ['ma_phong' => $b])->withErrors($validator)->withInput();
        } else {
            $update =  $request->all();
            $phong=phong::where('ma_phong','=',$update['ma_phong'])->first();
            $phong->ma_phong=$update['ma_phong'];
            $phong->ma_loai_phong=$update['ma_loai_phong'];
            $phong->tinh_trang=$update['tinh_trang'];
              $phong->save();
            // $phong->ma_loai_phong=Request::get('ma_loai_phong');
            // $phong->tinh_trang=Request::get('tinh_trang');
            // $phong->update();
            return redirect()->route('view_all_phong');
        }
    }
}
