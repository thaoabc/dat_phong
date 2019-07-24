<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Request;
use App\Model\nha_nghi;

/**
 * 
 */
class NhaNghiController extends BaseController
{
    public function nha_nghi()
    {   
        return view('layer.master');
    }

    public function view_all()
    {   
        $nha_nghi=new nha_nghi();
        $array_nha_nghi=$nha_nghi->view_all();
        return view('nha_nghi.view_all',['array_nha_nghi'=>$array_nha_nghi]);
    }

    public function view_insert()
    {
        return view('nha_nghi.view_insert');
    }

    public function process_insert()
    {   
        $nha_nghi=new nha_nghi();
        $nha_nghi->ten_nha_nghi=Request::get('ten_nha_nghi');
        $nha_nghi->dia_chi=Request::get('dia_chi');
        $nha_nghi->mo_ta=Request::get('mo_ta');
        $nha_nghi->process_insert();
        return redirect()->route('view_all_nha_nghi');
    }

    public function delete($ma_nha_nghi)
    {   
        $nha_nghi=new nha_nghi();
        $nha_nghi->ma_nha_nghi=$ma_nha_nghi;
        $nha_nghi->delete();
        return redirect()->route('view_all_nha_nghi');
    }

    public function view_one($ma_nha_nghi)
    {   
        $nha_nghi=new nha_nghi();
        $nha_nghi->ma_nha_nghi=$ma_nha_nghi;
        $nha_nghi=$nha_nghi->view_one();
        return view('nha_nghi.view_one',['nha_nghi'=>$nha_nghi]);
    }

    public function update()
    {   
        $nha_nghi=new nha_nghi();
        $nha_nghi->ma_nha_nghi=Request::get('ma_nha_nghi');
        $nha_nghi->ten_nha_nghi=Request::get('ten_nha_nghi');
        $nha_nghi->dia_chi=Request::get('dia_chi');
        $nha_nghi->mo_ta=Request::get('mo_ta');
        $nha_nghi->tinh_trang=Request::get('tinh_trang');
        $nha_nghi=$nha_nghi->update();
        return redirect()->route('view_all_nha_nghi');
    }
}