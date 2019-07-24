<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function index()
    {
        $khach_hang = DB::table('khach_hang')->get();

        return view('search', compact('khach_hang'));
    }

    public function action(Request $request)
    {
    	$output='';
        if ($request->ajax()) {
            $query =$request->get('query');
            if ($query!='') {
            	 $data = DB::table('khach_hang')->where('ten_khach_hang', 'LIKE', '%' . $query . '%')
            	 ->orWhere('email','LIKE', '%' . $query . '%')
            	 ->orderBy('ma_khach_hang','desc')
            	 ->get();
            }
            else{
            	$data=DB::table('khach_hang')
            			->orderBy('ma_khach_hang','desc')
            			->get();
            }
            $total_row=$data->count();
            if ($total_row>0) {
            	foreach ($data as $row) {
            		$output.='
            		<tr>
            			<td>'.$row->ten_khach_hang.'</td>
            			<td>'.$row->email.'</td>
            		</tr>
            		';
            	}
            }
            else{
            	$output='
            		<tr>
            			<td align="center" colspan="2">Không tìm thấy</td>
            		</tr>
            		';
            }
            $data=array(
            	'table_data' => $output,
            	'total_data' => $total_row
            );
            echo json_encode($data);
        }
    }
}