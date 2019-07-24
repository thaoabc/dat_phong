<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Model\loai_phong;
use App\Model\Phong;
use DB;

class LoaiPhongController extends Controller
{
    public function view_all()
    {   
        $array_loai_phong=loai_phong::all();

        return view('loai_phong.view_all',['array_loai_phong'=>$array_loai_phong]);
    }

    public function view_insert()
    {
        return view('loai_phong.view_insert');
    }

    public function process_insert(Request $request)
    {   
        // $loai_phong=new loai_phong();
        // $loai_phong->ten_loai_phong=Request::get('ten_loai_phong');
        // $loai_phong->gia=Request::get('gia');
        // $loai_phong->mo_ta=Request::get('mo_ta');
        // $loai_phong->process_insert();
        $loai_phong=new loai_phong();
        $rules = [
            'ten_loai_phong' =>'required',
            'gia' =>'required|numeric',
            'mo_ta' =>'required',
            'anh' => 'required|image'
        ];
        $messages = [
            'ten_loai_phong.required' => 'Tên admin là trường bắt buộc',
            'gia.required' => 'Giá là trường bắt buộc',
            'gia.numeric' => 'Giá phòng là số',
            'mo_ta.required' => 'Mô tả là trường bắt buộc',
            'anh.required' => 'Ảnh là trường bắt buộc',
            'anh.image' => 'Sai định dạng ảnh',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect('loai_phong/view_insert_loai_phong')->withErrors($validator)->withInput();
        } else {
            $loai_phong->ten_loai_phong=$request->input('ten_loai_phong');
            $loai_phong->gia=$request->input('gia');
            $loai_phong->mo_ta=$request->input('mo_ta');
            $loai_phong->anh=$request->file('anh');
            //Storage::disk('public')->put('loai_phong', '$anh');
            $loai_phong->save();
            return redirect()->route('view_all_loai_phong');
        }
    }

    public function delete($ma_loai_phong)
    {   
        $loai_phong=new loai_phong();
        $loai_phong->ma_loai_phong=$ma_loai_phong;
        $loai_phong=loai_phong::find($ma_loai_phong);
        $loai_phong->delete();
        return redirect()->route('view_all_loai_phong');
    }

    public function view_one($ma_loai_phong)
    {   
        $loai_phong=new loai_phong();
        $loai_phong->ma_loai_phong=$ma_loai_phong;
        $loai_phong=loai_phong::find($ma_loai_phong);
        return view('loai_phong.view_one',['loai_phong'=>$loai_phong]);
    }

    public function update(Request $request)
    {   
        $loai_phong=new loai_phong();
        $rules = [
            'ten_loai_phong' =>'required',
            'gia' =>'required|numeric',
            'mo_ta' =>'required',
            'anh' => 'required|image'
        ];
        $messages = [
            'ten_loai_phong.required' => 'Tên admin là trường bắt buộc',
            'gia.required' => 'Giá là trường bắt buộc',
            'gia.numeric' => 'Giá phòng là số',
            'mo_ta.required' => 'Mô tả là trường bắt buộc',
            'anh.required' => 'Ảnh là trường bắt buộc',
            'anh.image' => 'Sai định dạng ảnh',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        
        if ($validator->fails()) {
            $give_all=$request->all();
            $ma_loai_phong=$give_all['ma_loai_phong'];
            $b = (int)$ma_loai_phong;
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect()->route('view_one_loai_phong', ['ma_loai_phong' => $b])->withErrors($validator)->withInput();
        } else {
            $update =  $request->all();
            $loai_phong=loai_phong::where('ma_loai_phong','=',$update['ma_loai_phong'])->first();
            $loai_phong->ma_loai_phong=$update['ma_loai_phong'];
            $loai_phong->ten_loai_phong=$update['ten_loai_phong'];
            $loai_phong->gia=$update['gia'];
            $loai_phong->mo_ta=$update['mo_ta'];
            $anh=$request->file('anh');
           // $loai_phong->anh=Storage::disk('public')->put('loai_phong', '$anh');
            $loai_phong->save();
            // $loai_phong->ma_loai_phong=Request::get('ma_loai_phong');
            // $loai_phong->ten_loai_phong=Request::get('ten_loai_phong');
            // $loai_phong->gia=Request::get('gia');
            // $loai_phong->mo_ta=Request::get('mo_ta');
            // $loai_phong->update();
            return redirect()->route('view_all_loai_phong');
        }
    }
}
