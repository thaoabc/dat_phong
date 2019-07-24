<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{   

    const MODEL = 'user';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('ma_admin')->unsigned();
            $table->string('ten_admin',50);
            $table->string('so_dien_thoai',13)->unique();
            $table->string('email',128)->unique();
            $table->string('password',64);
            $table->integer('cap_do');
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
        Schema::dropIfExists('admin');
    }
}
