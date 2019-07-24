<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khach_hang', function (Blueprint $table) {
            $table->increments('ma_khach_hang')->unsigned();
            $table->string('ten_khach_hang',50);
            $table->string('so_dien_thoai',13)->unique();
            $table->string('email',128)->unique();
            $table->string('password',64);
            $table->string('so_chung_minh');
            $table->boolean('gioi_tinh');
            $table->date('ngay_sinh');
            $table ->string('remember_token', 100) -> nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khach_hang');
    }
}
