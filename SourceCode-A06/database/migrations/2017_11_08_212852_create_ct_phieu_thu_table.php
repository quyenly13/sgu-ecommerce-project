<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCtPhieuThuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ct_phieu_thu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pthu');
            $table->integer('id_goitin');
            $table->integer('so_luong');
            $table->integer('thanh_tien');
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
        Schema::dropIfExists('ct_phieu_thu');
    }
}
