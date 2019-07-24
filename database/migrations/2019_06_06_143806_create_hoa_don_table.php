<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoaDonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('hoa_don', function (Blueprint $table) {
            $table->increments('ma_hoa_don')->unsigned();
            $table->integer('ma_khach_hang')->unsigned();
            $table->date('ngay_nhan_phong');
            $table->date('ngay_tra_phong');
            $table->integer('tinh_trang');
            $table->float('thanh_tien');
            $table->foreign('ma_khach_hang')->references('ma_khach_hang')->on('khach_hang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoa_don');
    }
}
