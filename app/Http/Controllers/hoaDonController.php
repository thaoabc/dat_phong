<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use App\Model\hoa_don;
use App\Model\phong;

class hoaDonController extends Controller
{   
    public function getDay($tinh_trang)
    {
        $hoa_don=new hoa_don();
        //getdate
        $ngay_nhan_phong=hoa_don::first()->ngay_nhan_phong;
        $ngay_tra_phong=hoa_don::first()->ngay_tra_phong;
        $now=Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $date1 = new DateTime($ngay_nhan_phong);
        $date2 = new DateTime($ngay_tra_phong);
        $interval = ($date1->diff($date2))->d;

        $array_ngay=array(
            "day"  => $interval,
            "tinh_trang" => $tinh_trang,
        );

        return $array_ngay;
    }
    public function view_all()
    {
        $hoa_don=new hoa_don();
        //getdate
        $interval = $this->getDay('1');

        $array_hoa_don=$hoa_don->view_all();

    	return view('hoa_don.view_all',['array_hoa_don'=>$array_hoa_don],['day'=>$interval]);
    }
    public function chua_nhan_phong()
    {
        $hoa_don=new hoa_don();
        //getdate
        $interval = $this->getDay('1');
        $array_hoa_don=$hoa_don->chua_nhan_phong();

        return view('hoa_don.view_all',['array_hoa_don'=>$array_hoa_don],['day'=>$interval]);
    }
    public function dang_su_dung()
    {
        $hoa_don=new hoa_don();
        //getdate
        $interval = $this->getDay('2');
        $array_hoa_don=$hoa_don->dang_su_dung();

        return view('hoa_don.view_all',['array_hoa_don'=>$array_hoa_don],['day'=>$interval]);
    }
    public function da_thanh_toan()
    {
        $hoa_don=new hoa_don();
        //getdate
        $interval = $this->getDay(3);
        $array_hoa_don=$hoa_don->da_thanh_toan();

        return view('hoa_don.view_all',['array_hoa_don'=>$array_hoa_don],['day'=>$interval]);
    }
    public function xac_nhan($ma_hoa_don)
    {
        $hoa_don=new hoa_don();
        hoa_don::where('ma_hoa_don',$ma_hoa_don)
        		->update(['tinh_trang'=>2]);
        return redirect()->route('view_all_hoa_don',['tinh_trang'=>2]);
    }
    public function dung_thue($ma_hoa_don)
    {
        $hoa_don=new hoa_don();
        //date
        $ngay_nhan_phong=hoa_don::find($ma_hoa_don)->ngay_nhan_phong;
        $now=Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $date1 = new DateTime($ngay_nhan_phong);
        $date2 = new DateTime($now);
        $interval = $date1->diff($date2);

        //price
        $ma_phong = hoa_don::find($ma_hoa_don)->hoa_don_chi_tiets->first()->ma_phong;
        $gia_phong=phong::find($ma_phong)->loai_phong->first()->gia;
        
        //end
        hoa_don::where('ma_hoa_don',$ma_hoa_don)
                ->update(['tinh_trang'=>3],['thanh_tien'=>$gia_phong*($interval->d)]);
        return redirect()->route('view_all_hoa_don',
                        ['day'=>$interval],
                        ['tinh_trang'=>4]
                        );
    }
    public function thanh_toan($ma_hoa_don)
    {
        $hoa_don=new hoa_don();
        hoa_don::where('ma_hoa_don',$ma_hoa_don)
                ->update(['tinh_trang'=>3]);
        return redirect()->route('view_all_hoa_don');
    }
}
