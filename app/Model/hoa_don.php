<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class hoa_don extends Model
{
    protected $table='hoa_don';
	public $primaryKey='ma_hoa_don';

	 protected $fillable = [
        'ma_hoa_don', 'ma_khach_hang', 'ngay_nhan_phong','ngay_tra_phong','tinh_trang','thanh_tien',
    ];

    public $timestamps = false;
    protected $hidden = [];

     public function hoa_don_chi_tiets()
    {
        return $this->hasMany('App\Model\hoa_don_chi_tiet','ma_hoa_don');
    }

    public function khach_hangs()
    {
         return $this->belongsTo('App\Model\khach_hang','ma_khach_hang');
    }

    public function getTenTinhTrangAttribute($value)
    {
        switch ($this->tinh_trang) {
            case '1':
                return "Phòng trống";
                break;
            case '2':
                return "Đã đặt";
                break;
            case '3':
                return "Tạm dừng sử dụng";
                break;
        }
    }
    public function view_all()
    {
        $hoa_don = DB::table('hoa_don')
	        ->join('khach_hang','hoa_don.ma_khach_hang','=','khach_hang.ma_khach_hang')
	        ->simplePaginate(3);
        return $hoa_don;
    }
    public function chua_nhan_phong()
    {
        $hoa_don = DB::table('hoa_don')
            ->join('khach_hang','hoa_don.ma_khach_hang','=','khach_hang.ma_khach_hang')
            ->where('tinh_trang',1)
            ->simplePaginate(3);
        return $hoa_don;
    }
    public function dang_su_dung()
    {
        $hoa_don = DB::table('hoa_don')
            ->join('khach_hang','hoa_don.ma_khach_hang','=','khach_hang.ma_khach_hang')
            ->where('tinh_trang',2)
            ->simplePaginate(3);
        return $hoa_don;
    }
    public function da_thanh_toan()
    {
        $hoa_don = DB::table('hoa_don')
            ->join('khach_hang','hoa_don.ma_khach_hang','=','khach_hang.ma_khach_hang')
            ->where('tinh_trang',3)
            ->simplePaginate(3);
        return $hoa_don;
    }
}
