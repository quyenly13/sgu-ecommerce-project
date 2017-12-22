<?php

use Illuminate\Database\Seeder;
use App\Models\Goitin;

class GoitinSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Goitin::create(
            array(
                'so_luong' => 20,
                'don_gia' => 20000,
            )   
            );
        Goitin::create(
            array(
                'so_luong' => 50,
                'don_gia' => 50000,
            )   
            );
        
        Goitin::create(
            array(
                'so_luong' => 100,
                'don_gia' => 100000,
            )   
            );
        Goitin::create(
            array(
                'so_luong' => 200,
                'don_gia' => 200000,
            )   
            );
    }
}
