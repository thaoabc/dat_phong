<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Response;
use Carbon\Carbon;
use DateTime;
use DB;
use App\Model\dat_phong;
use App\Model\loai_phong;
use App\Model\khach_hang;
use App\Model\hoa_don;
use App\Model\hoa_don_chi_tiet;
use App\Model\phong;


class DatPhongController extends Controller
{
    public function view_dat_phong()
	{	
		$array_loai_phong=loai_phong::all();
		$array_khach_hang=khach_hang::all();
		return view('dat_phong.view_dat_phong',
			['array_loai_phong'=>$array_loai_phong],
			['array_khach_hang'=>$array_khach_hang]
		);
	}

	public function view_phong(Request $request)
	{	
		$hoa_don=new hoa_don();
		$dt = Carbon::now();
		$day=$dt->addDay(1)->toDateString();
		$rules = [
            'ngay_nhan_phong' =>'date|after:'.$day,
            'ngay_tra_phong' =>'required|after:ngay_nhan_phong'
        ];
        $messages = [
            'ngay_nhan_phong.required' => 'Ngày nhận phòng là trường bắt buộc',
            'ngay_nhan_phong.after' => 'Ngày nhận phòng phải sau ngày hiện tại',
            'ngay_tra_phong.required' => 'Ngày trả phòng là trường bắt buộc',
            'ngay_tra_phong.after' => 'Ngày trả phòng phải sau ngày đặt phòng',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect('dat_phong/view_dat_phong')->withErrors($validator)->withInput();
        } else {
			$give_inf =  $request->all();
			$ma_loai_phong=$request->input('ma_loai_phong');
			$ngay_nhan_phong=$request->input('ngay_nhan_phong');
	    	$ngay_tra_phong=$request->input('ngay_tra_phong');
	    	$array_ngay=array(
	    		"ngay_nhan_phong"  => $ngay_nhan_phong,
				"ngay_tra_phong" => $ngay_tra_phong,
	    	);
			$hoa_don = hoa_don::whereDate('ngay_nhan_phong','<=',$give_inf['ngay_nhan_phong'])
							->whereDate('ngay_tra_phong','>=',$give_inf['ngay_tra_phong'])
							->whereIn('tinh_trang',[1,2])
							->pluck('ma_hoa_don');
			if (($hoa_don->count())==0){
				$array_phong=phong::where('ma_loai_phong','=',$ma_loai_phong)
									->get();
				// return  redirect()->route('view_phong',
				// 	['array_phong'=>$array_phong]
				// );
				return view('dat_phong.view_phong',
					['array_phong'=>$array_phong],
					['array_ngay'=>$array_ngay]
					
				);
			}
			else{
				$phong=array();
				foreach ($hoa_don as $hoa_don) {
					$hoa_don_chi_tiets = hoa_don::find($hoa_don)->hoa_don_chi_tiets;
					$ma_phong=$hoa_don_chi_tiets->pluck('ma_phong');
					$phong= phong::whereNotIn('ma_phong',$ma_phong)
											->pluck('ma_phong');
				}
				$array_phong=phong::where('ma_loai_phong','=',$ma_loai_phong)
									->whereIn('ma_phong',$phong)
									->get();
				return view('dat_phong.view_phong',
					['array_phong'=>$array_phong],
					['array_ngay'=>$array_ngay]
					
				);				
			}
		}
						
		
		// $comment = hoa_don::find(1);
		// $ma_phong=$comment->hoa_don_chi_tiet->ma_phong;
						
		
        // $hoa_don->ngay_nhan_phong=$request->input('ngay_nhan_phong');
        // $loai_phong->ngay_tra_phong=$request->input('ngay_tra_phong');
        // $loai_phong->loai_phong=$request->input('loai_phong');
	}
	public function dat_phong(Request $request)
	{	
		$give_inf =  $request->all();
		$hoa_don=new hoa_don();
		$ngay_nhan_phong=$give_inf['ngay_nhan_phong'];
		$ngay_tra_phong=$give_inf['ngay_tra_phong'];

		$date1 = new DateTime($ngay_nhan_phong);
	  	$date2 = new DateTime($ngay_tra_phong);
	  	$interval = $date1->diff($date2);

		$ma_phong=$give_inf['ma_phong'];
		$phong=phong::find($ma_phong)->loai_phong;
		$ma_loai_phong=$phong->pluck('ma_loai_phong');
		$gia_phong=loai_phong::where('ma_loai_phong',$ma_loai_phong)
							->first()->gia;
		$ma_hoa_don = DB::table('hoa_don')->insertGetId(
    ['ma_khach_hang' => '4', 'ngay_nhan_phong' => $ngay_nhan_phong, 'ngay_tra_phong' => $ngay_tra_phong,'tinh_trang'=> '1','thanh_tien'=>$gia_phong*($interval->d)]
);

		$hoa_don_chi_tiet=new hoa_don_chi_tiet();
		$hoa_don_chi_tiet->ma_hoa_don=$ma_hoa_don;
		$hoa_don_chi_tiet->ma_phong=$ma_phong;
		$hoa_don_chi_tiet->so_luong=1;
		$hoa_don_chi_tiet->save();

        return redirect()->to('hoa_don/view_all_hoa_don');
	}
}
