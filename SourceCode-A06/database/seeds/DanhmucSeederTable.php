<?php

use Illuminate\Database\Seeder;
use App\Models\Danhmuc;

class DanhmucSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Danhmuc::create(
            array(
            'id' => '1',
            'ten_danh_muc' => 'Đồ chơi ngoài trời',
            'mo_ta' => 'Đồ chơi ngoài trời',
            )
        );
         Danhmuc::create(
            array(
            'id' => '3',
            'ten_danh_muc' => 'Đồ chơi hóa trang',
            'mo_ta' => 'Đồ chơi hóa trang thành các nhân vật',
            )
        );
         Danhmuc::create(
            array(
            'id' => '4',
            'ten_danh_muc' => 'Đồ chơi thú nhồi bông',
            'mo_ta' => 'Gấu bông các loại đủ loại kích cỡ',
            )
        );
         Danhmuc::create(
            array(
            'id' => '5',
            'ten_danh_muc' => 'Đồ chơi điều khiển',
            'mo_ta' => 'Đồ chơi búp bê cho trẻ em',
            )
        );
         Danhmuc::create(
            array(
                'id' => '6',
            'ten_danh_muc' => 'Đồ chơi búp bê',
            'mo_ta' => 'Đồ chơi búp bê cho trẻ em',
            )
        );
         Danhmuc::create(
            array(
                'id' => '7',
            'ten_danh_muc' => 'Đồ chơi nhân vật',
            'mo_ta' => 'Đồ chơi búp bê cho trẻ em',
            )
        );
         Danhmuc::create(
            array(
                'id' => '8',
            'ten_danh_muc' => 'Đồ chơi xếp hình',
            'mo_ta' => 'Đồ chơi búp bê cho trẻ em',
            )
        );
         Danhmuc::create(
            array(
                'id' => '9',
            'ten_danh_muc' => 'Đồ chơi giáo dục',
            'mo_ta' => 'Đồ chơi búp bê cho trẻ em',
            )
        );
         Danhmuc::create(
            array(
                'id' => '10',
            'ten_danh_muc' => 'Đồ chơi truyển thống',
            'mo_ta' => 'Đồ chơi búp bê cho trẻ em',
            )
        );
    }
}
