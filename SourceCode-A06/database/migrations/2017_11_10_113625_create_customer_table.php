<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id_c')->primarykey();
            $table->string('ten_dang_nhap', 20);
            $table->string('password');
            $table->string('email', 50)->unique();
            $table->string('anh_dai_dien')->nullable();
            $table->string('ho_ten', 50)->nullable();
            $table->string('gioi_tinh', 5)->nullable();
            $table->string('sdt', 12)->unique();
            $table->string('dia_chi', 100)->nullable();
            // $table->integer('login_count');
            // $table->string('active_token')->unique();
            $table->boolean('is_active')->default(0);
             $table->timestamps();
            $table->rememberToken();
            // $table->boolean('trang_thai');
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
