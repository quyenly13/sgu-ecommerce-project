<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhGiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_gia', function (Blueprint $table) {
            $table->increments('id')->primarykey();
            $table->integer('id_m');
            $table->integer('id_c');
            $table->integer('diem_so');
            $table->timestamps('ngay_danh_gia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danh_gia');
    }
}
