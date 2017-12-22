<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham', function (Blueprint $table) {
            $table->increments('id')->primarykey();
            $table->string('ten_san_pham', 100);
            $table->integer('id_m');
            $table->integer('ma_danh_muc');
            $table->integer('so_luong_ton_kho');
            $table->integer('don_gia');
            $table->string('anh_dai_dien', 500);
            $table->string('xuat_xu', 30);
            $table->string('mo_ta', 1000);
            $table->boolean('trang_thai');
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
        Schema::dropIfExists('san_pham');
    }
}
