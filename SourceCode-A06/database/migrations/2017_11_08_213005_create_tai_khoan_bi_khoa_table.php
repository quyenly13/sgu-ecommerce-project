<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaiKhoanBiKhoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tai_khoan_bi_khoa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_m');
            $table->integer('id_w');
            $table->string('li_do');
            $table->boolean('trang_thai');
            $table->timestamps('ngay_khoa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tai_khoan_bi_khoa');
    }
}
