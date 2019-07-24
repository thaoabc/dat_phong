<?php

namespace App\Model;
use DB;

class nha_nghi
{	
	protected $table='nha_nghi';
	public function view_all()
	{
		$array_nha_nghi=DB::select("select*from $this->table");
		return $array_nha_nghi;
	}

	public function process_insert()
	{
		DB::insert("insert into $this->table(ma_admin,ten_nha_nghi,dia_chi,mo_ta,tinh_trang) values(2,?,?,?,1)",[$this->ten_nha_nghi,$this->dia_chi,$this->mo_ta]);
	}
    
    public function delete()
    {
    	DB::delete("delete from $this->table where ma_nha_nghi=?",[$this->ma_nha_nghi]);
    }

    public function view_one()
    {
    	$nha_nghi=DB::select("select*from $this->table where ma_nha_nghi=?",[$this->ma_nha_nghi]);
    	return $nha_nghi[0];
    }

    public function update()
    {
    	DB::update("update $this->table set ten_nha_nghi=?,dia_chi=?,mo_ta=?,tinh_trang=? where ma_nha_nghi=?",[$this->ten_nha_nghi,$this->dia_chi,$this->mo_ta,$this->tinh_trang,$this->ma_nha_nghi]);
    }
}
