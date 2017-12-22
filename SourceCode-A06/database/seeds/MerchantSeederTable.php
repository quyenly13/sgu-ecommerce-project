<?php

use Illuminate\Database\Seeder;
use App\Models\Merchant;

class MerchantSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Merchant::create(
            array(
                'ten_dang_nhap' => 'Teo',
                'mat_khau' => 'dgdgdg',
                'email' => 'lyvandong20@gmail.com',
                'anh_dai_dien' => 'vhgbhsjbvhj',
                'ho_ten' => 'Lý Văn Tèo',
                'gioi_tinh' => 'Nam',
                'sdt' => '09023465',
                'trang_thai' => '1',
                
                'so_tk' => '58757826578',
                'so_cmnd' => '758785555',
                'dia_chi' => '12 Nguyen Thi Minh Khai',
                'so_luong_tin' => '0',
            )
            );
        Merchant::create(
            array(
                'ten_dang_nhap' => 'Ty',
                'mat_khau' => 'dgdgdg',
                'email' => 'nhutu16021996@gmail.com',
                'anh_dai_dien' => 'vhgbhsjbvhj',
                'ho_ten' => 'Lý Văn Tèo',
                'gioi_tinh' => 'Nam',
                'sdt' => '1111119',
                'trang_thai' => '1',
                'so_tk' => '587578265788',
                'so_cmnd' => '759878358',
                'dia_chi' => '12 Nguyen Thi Minh Khai',
                'so_luong_tin' => '0',
            )
            );
        Merchant::create(
            array(
                'ten_dang_nhap' => 'Meo',
                'mat_khau' => 'dgdgdg',
                'email' => 'lykieuquyen@gmail.com',
                'anh_dai_dien' => 'vhgbhsjbvhj',
                'ho_ten' => 'Lý Văn Tèo',
                'gioi_tinh' => 'Nam',
                'sdt' => '022456789',
                'trang_thai' => '1',
                'so_tk' => '587578265578',
                'so_cmnd' => '755983785',
                'dia_chi' => '12 Nguyen Thi Minh Khai',
                'so_luong_tin' => '0',
            )
            );
        
    }
}
