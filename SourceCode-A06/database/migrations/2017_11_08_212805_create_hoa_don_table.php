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
            $table->increments('id')->primarykey();
            $table->integer('id_c');
            $table->string('dia_chi');
            $table->string('ghi_chu_KH')->nullable();
            $table->string('SDT');
            $table->integer('trang_thai');
            $table->integer('tong_tien');
            $table->timestamps('ngay_tao');
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
