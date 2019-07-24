<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class loai_phong extends Model
{	
    protected $table='loai_phong';
    public $primaryKey = 'ma_loai_phong';
    protected $fillable = [
        'ma_loai_phong', 'ten_loai_phong', 'gia','anh','mo_ta',
    ];

    public $timestamps = false;
    protected $hidden = [];

    // public function view_all()
    // {
    //     $loai_phong = DB::table('loai_phong')->get();
    //     return $loai_phong;
    // }

    // public function view_one()
    // {
    //     $loai_phong = DB::table('loai_phong')->where('ma_loai_phong', $this->ma_loai_phong)->first();
    //     return $loai_phong;
    // }


    // public function process_insert()
    // {
    //     DB::insert("insert into $this->table(ten_loai_phong,gia,mo_ta) values(?,?,?)",[$this->ten_loai_phong,$this->gia,$this->mo_ta]);
    // }

    //  public function delete()
    // {
    //    DB::table('loai_phong')->where('ma_loai_phong', '=', $this->ma_loai_phong)->delete();
    // }
    // public function update()
    // {
    // 	DB::update("update $this->table set ten_loai_phong=?,gia=?,mo_ta=? where ma_loai_phong=?",
    // 		[$this->ten_loai_phong,$this->gia,$this->mo_ta,$this->ma_loai_phong]);
    // }
}
