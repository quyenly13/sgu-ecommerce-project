<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtHoaDonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_hoa_don', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_hd');
            $table->integer('id_sp');
            $table->integer('id_m');
            $table->integer('so_luong');
            $table->integer('tong_tien');
            $table->integer('trang_thai');
            $table->integer('rating');
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
        Schema::dropIfExists('ct_hoa_don');
    }
}
