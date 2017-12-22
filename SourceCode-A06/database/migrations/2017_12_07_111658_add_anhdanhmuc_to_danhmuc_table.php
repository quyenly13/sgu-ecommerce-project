<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAnhdanhmucToDanhmucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('danh_muc', function($table)
      {
        $table->string('anh_dai_dien',500)->nullable();
      });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
      {
        Schema::table('danh_muc', function (Blueprint $table) {
          $table->dropColumn('anh_dai_dien');
        });
      }

      
}
