<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoaDonChiTietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_don_chi_tiet', function (Blueprint $table) {
            $table->integer('ma_hoa_don')->unsigned();
            $table->integer('ma_phong')->unsigned();
            $table->integer('so_luong');
            $table->primary(['ma_hoa_don','ma_phong']);
             $table->foreign('ma_hoa_don')->references('ma_hoa_don')->on('hoa_don');
            $table->foreign('ma_phong')->references('ma_phong')->on('phong');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoa_don_chi_tiet');
    }
}
