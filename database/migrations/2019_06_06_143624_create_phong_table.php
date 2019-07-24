<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phong', function (Blueprint $table) {
            $table->increments('ma_phong')->unsigned();
            $table->integer('ma_loai_phong')->unsigned();
            $table->string('ten_phong',10);
            $table->integer('tinh_trang');
            $table->foreign('ma_loai_phong')->references('ma_loai_phong')->on('loai_phong');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phong');
    }
}
