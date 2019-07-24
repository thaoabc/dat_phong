<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class khach_hang extends Model
{
    protected $table='khach_hang';
    public $primaryKey = 'ma_khach_hang';
    protected $fillable = [
        'ma_khach_hang', 'ten_khach_hang','so_dien_thoai','email','password',
        'so_chung_minh','gioi_tinh','ngay_sinh',
    ];
    public $timestamps = false;

    protected $hidden = [];
}
