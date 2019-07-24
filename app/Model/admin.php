<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class admin extends Model
{	
	protected $table='admin';
	public $primaryKey='ma_admin';

	 protected $fillable = [
        'ma_admin', 'ten_admin', 'so_dien_thoai','email','password','cap_do','	password_reminder_token'
    ];

    public $timestamps = false;
    protected $hidden = ['password', 'remember_token',];
	// public function process_login()
	// {
	// 	$admin = admin::where('email','=',$this->email)
	// 				->where('mat_khau','=',$this->mat_khau);
	// 	$count=$admin->count();
	// 	return $count;
	// }

	// public function cap_do()
	// {
	// 	$admin = admin::where('cap_do',1);
	// 	$admin=$admin->count();
	// 	return $admin;
	// }

	// public function view_all()
	// {
	// 	$array_admin=DB::select("select*from $this->table");
	// 	return $array_admin;
	// }

	// public function view_one()
	// {
	// 	$array_admin=DB::select("select*from $this->table where ma_admin=?",[$this->ma_admin]);
	// 	return $array_admin[0];
	// }

	// public function delete()
	// {
	// 	$array_admin=DB::delete("delete from admin where ma_admin=?",[$this->ma_admin]);
	// }

	// public function process_insert()
	// {
	// 	DB::insert("insert into $this->table(ten_admin,so_dien_thoai,email,mat_khau,dia_chi,gioi_tinh,cap_do,ngay_sinh) values(?,?,?,?,?,?,?,?)",[$this->ten_admin,$this->so_dien_thoai,$this->email,$this->mat_khau,$this->dia_chi,$this->gioi_tinh,$this->cap_do,$this->ngay_sinh]);
	// }
    
}
