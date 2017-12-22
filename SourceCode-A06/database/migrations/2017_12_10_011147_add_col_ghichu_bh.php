<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColGhichuBh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
      Schema::table('hoa_don', function($table)
      {
        $table->string('ghi_chu_BH',500)->nullable();
      });

       Schema::table('ct_hoa_don', function($table)
      {
        $table->string('ghi_chu_BH',500)->nullable();
      });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
      {
        Schema::table('hoa_don', function (Blueprint $table) {
          $table->dropColumn('ghi_chu_BH');
        });
        Schema::table('ct_hoa_don', function (Blueprint $table) {
          $table->dropColumn('ghi_chu_BH');
        });
      }

}
