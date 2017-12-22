<?php

use Illuminate\Database\Seeder;
use App\Models\Quantrivien;

class WebmasterSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quantrivien::create(
		array(
		'ten_dang_nhap' => 'admin',
		'mat_khau' => bcrypt('admin123'),
		'email' => 'admin@gmail.com',
		'trang_thai' => '1',
		)
		);
    }
}
