<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $this->call(DanhmucSeederTable::class);
        $this->call(SanphamSeederTable::class);
        $this->call(MerchantSeederTable::class);
		$this->call(ThemAnhDanhMucSeeder::class);
        $this->call(WebmasterSeederTable::class);
        $this->call(GoitinSeederTable::class);
    }
}
