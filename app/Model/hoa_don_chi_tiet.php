<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class hoa_don_chi_tiet extends Model
{
    protected $table='hoa_don_chi_tiet';
	public $primaryKey='ma_hoa_don';

	 protected $fillable = [
        'ma_hoa_don', 'ma_phong','so_luong',
    ];

    public $timestamps = false;
    protected $hidden = [];

     public function phong()
    {
        return $this->belongsTo('App\Model\phong','ma_phong');
    }
}
