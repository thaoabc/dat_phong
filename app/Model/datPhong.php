<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class dat_phong extends Model
{
    protected $table='phong';
	public $primaryKey='ma_phong';

	 protected $fillable = [
        'ma_phong', 'ma_loai_phong', 'tinh_trang',
    ];

    public $timestamps = false;
    protected $hidden = [];

    
}
