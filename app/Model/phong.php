<?php

namespace App\Model;

use DB;

use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{	
    protected $table='phong';
    public $primaryKey = 'ma_phong';
    protected $fillable = [
        'ma_phong', 'ma_loai_phong','ten_phong','tinh_trang',
    ];
    public $timestamps = false;

    protected $hidden = [];
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
        $phong = DB::table('phong')
	        ->join('loai_phong','phong.ma_loai_phong','=','loai_phong.ma_loai_phong')
	        ->simplePaginate(3);
        return $phong;
    }
    public function loai_phong()
    {
        return $this->belongsTo('App\Model\loai_phong', 'ma_loai_phong');
    }

    // public function view_one()
    // {

    //     $phong = DB::table('phong')->where('ma_phong', $this->ma_phong)->first();
    //     // dd($phong);
    //     return $phong;
    // }

    // public function process_insert()
    // {
    //     DB::insert("insert into $this->table(ma_loai_phong,tinh_trang) values(?,?)",[$this->ma_loai_phong,$this->tinh_trang]);
    // }

    //  public function update()
    // {
    // 	DB::update("update $this->table set ma_loai_phong=?,tinh_trang=? where ma_phong=?",
    // 		[$this->ma_loai_phong,$this->tinh_trang,$this->ma_phong]);
    // }
}
