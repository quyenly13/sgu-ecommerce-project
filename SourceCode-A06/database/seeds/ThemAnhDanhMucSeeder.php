<?php

use Illuminate\Database\Seeder;

class ThemAnhDanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('danh_muc')->where('id',1)->update(['anh_dai_dien'=>'uploads/cat_img/cat1.png']);
         DB::table('danh_muc')->where('id',2)->update(['anh_dai_dien'=>'uploads/cat_img/cat2.png']);
         DB::table('danh_muc')->where('id',3)->update(['anh_dai_dien'=>'uploads/cat_img/cat3.png']);
         DB::table('danh_muc')->where('id',4)->update(['anh_dai_dien'=>'uploads/cat_img/cat4.png']);
         DB::table('danh_muc')->where('id',5)->update(['anh_dai_dien'=>'uploads/cat_img/cat5.png']);
         DB::table('danh_muc')->where('id',6)->update(['anh_dai_dien'=>'uploads/cat_img/cat6.png']);
         DB::table('danh_muc')->where('id',7)->update(['anh_dai_dien'=>'uploads/cat_img/cat7.png']);
         DB::table('danh_muc')->where('id',8)->update(['anh_dai_dien'=>'uploads/cat_img/cat8.png']);		
         DB::table('danh_muc')->where('id',9)->update(['anh_dai_dien'=>'uploads/cat_img/cat9.png']);
         DB::table('danh_muc')->where('id',10)->update(['anh_dai_dien'=>'uploads/cat_img/sub1.png']);
    }
}
