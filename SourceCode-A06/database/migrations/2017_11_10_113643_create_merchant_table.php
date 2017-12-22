<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant', function (Blueprint $table) {
            $table->increments('id_m')->primarykey();
            $table->string('ten_dang_nhap', 20);
            $table->string('mat_khau');
            $table->string('email', 50)->unique();
            $table->string('anh_dai_dien');
            $table->string('ho_ten', 50);
            $table->string('gioi_tinh', 5);
            $table->string('sdt', 12)->unique();
            $table->string('dia_chi', 100);
            $table->boolean('trang_thai');
            $table->string('so_tk', 15)->nullable();
            $table->string('so_cmnd', 12);
            $table->integer('so_luong_tin')->nullable();
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
        //
    }
}
