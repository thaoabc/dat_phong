<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaiPhongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loai_phong', function (Blueprint $table) {
            $table->increments('ma_loai_phong')->unsigned();
            $table->string('ten_loai_phong',50);
            $table->float('gia');
            $table->binary('anh');
            $table->string('mo_ta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loai_phong');
    }
}
