<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;
use App\Model\hoa_don;

/**
 * 
 */
class chartController extends BaseController
{
	// public function view_all()
	// {	
	// 	$array_hoa_don=hoa_don::where('tinh_trang','1')->get();
	// 	return view('chart.view_chart',['array_hoa_don'=>$array_hoa_don]);
	// }
	public function orderMonth()
    {
        $orderYear = DB::table('hoa_don')
                    ->select(DB::raw('month(ngay_tra_phong) as getMonth'), DB::raw('SUM(thanh_tien) as value'),DB::raw('year(ngay_tra_phong) as getYear'))
                    ->where('tinh_trang',1)
                    ->groupBy('getMonth')
                    ->groupBy('getYear')
                    ->orderBy('getMonth', 'ASC')
                    ->get();
        return view('chart.view_chart', compact('orderYear'));
    }

	public function orderYear()
    {
        $orderYear = DB::table('hoa_don')
                    ->select(DB::raw('year(ngay_tra_phong) as getYear'), DB::raw('SUM(thanh_tien) as value'))
                    ->where('tinh_trang',1)
                    ->groupBy('getYear')
                    ->orderBy('getYear', 'ASC')
                    ->get();
        return view('chart.view_chart', compact('orderYear'));
    }
}