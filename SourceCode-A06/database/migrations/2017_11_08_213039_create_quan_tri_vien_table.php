<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuanTriVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quan_tri_vien', function (Blueprint $table) {
            $table->increments('id')->primarykey();
            $table->string('ten_dang_nhap', 20);
            $table->string('mat_khau');
            $table->string('email', 50);
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
        Schema::dropIfExists('quan_tri_vien');
    }
}
