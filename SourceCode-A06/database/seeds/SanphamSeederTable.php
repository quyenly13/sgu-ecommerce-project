<?php

use Illuminate\Database\Seeder;
use App\Models\Sanpham;

class SanphamSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sanpham::create(
            array(
                'ten_san_pham' => 'Đồ Chơi Hải Tặc Thú Vị Kiểu Mới T205 - 2017 US04165',
                'id_m' => '1',
                'ma_danh_muc' => '10',
                'so_luong_ton_kho' => '12',
                'don_gia' => '12000',
                'xuat_xu' => 'Trung Quốc',
                'mo_ta' => 'Thiết kế độc đáo – sáng tạo
                            Tạo không khí vui nhộn, càng đông càng vui
                            Phù hợp chơi theo nhóm, rất cân não
                            Thích hợp làm trò giải trí trong các quán café, book shop, giải trí tại nhà….
                            Chất liệu nhựa loại 1 – Giúp sản phẩm bền, chịu va đập.
                            Cách chơi:

                            - Người chơi sử dụng thanh kiếm cho sẵn lần lượt đâm vào thân Hải Tặc

                            - Khi đâm trúng Hải Tặc , thân hải tặc sẽ bay lên và người chơi thắng',
                'anh_dai_dien' => 'uploads/do_choi_hai_tac.jpg',
                'trang_thai' => '1'
            )
        );

        Sanpham::create(
            array(
                'ten_san_pham' => 'Bộ bài Uno Giấy cứng Legaxi UNO1',
                'id_m' => '2',
                'ma_danh_muc' => '10',
                'so_luong_ton_kho' => '10',
                'don_gia' => '30000',
                'xuat_xu' => 'Việt Nam',
                'mo_ta' => '- Một bộ bài UNO bao gồm 108 quân bài gồm:
                            + 4 màu Đỏ, Xanh dương, Xanh lá và Vàng.
                            + Mỗi màu sẽ có những con số từ 1 - 9 và những lá bài có kí hiệu.',
                'anh_dai_dien' => 'uploads/uno.jpg',
                'trang_thai' => '1'
            )
        );

        Sanpham::create(
            array(
                'ten_san_pham' => 'Con quay 3 cánh đồng Sakura T7-005 ',
                'id_m' => '1',
                'ma_danh_muc' => '10',
                'so_luong_ton_kho' => '50',
                'don_gia' => '120000',
                'xuat_xu' => 'Việt Nam',
                'mo_ta' => 'Spinner là một sản phẩm EDC (everyday carry - luôn mang theo bên người), có thể giúp loại bỏ sự bồn chồn, lo lắng, hồi hộp;
Giúp tăng tính kiên nhẫn và khả năng tập trung.
Ngoài ra spinner là một đồ chơi high-end dành cho những người yêu thích các sản phẩm cơ khí chính xác cao.',
                'anh_dai_dien' => 'uploads/con_quay.jpg',
                'trang_thai' => '1'
            )
        );

        Sanpham::create(
            array(
                'ten_san_pham' => 'Bộ trò chơi khám răng cá sấu OEM (Xanh)  ',
                'id_m' => '1',
                'ma_danh_muc' => '10',
                'so_luong_ton_kho' => '12',
                'don_gia' => '15000',
                'xuat_xu' => 'Việt Nam',
                'mo_ta' => 'Khám răng cá sấu là món đồ chơi hết sức vui nhộn dành cho trẻ em hoặc
                 cả gia đình cùng chơi. Nó tạo cho người chơi sự hồi hộp và bất ngờ, một cảm giác
                  thú vị khi bạn chạm vào chiếc răng cá sấu và bị cả cái hàm to , khỏe cắn lấy ngón tay của bạn.',
                'anh_dai_dien' => 'uploads/ca_sau.jpg',
                'trang_thai' => '1'
            )
        );

        Sanpham::create(
            array(
                'ten_san_pham' => 'Bộ đồ chơi phi tiêu Dart Board cao cấp ',
                'id_m' => '1',
                'ma_danh_muc' => '10',
                'so_luong_ton_kho' => '12',
                'don_gia' => '40000',
                'xuat_xu' => 'Việt Nam',
                'mo_ta' => 'Bộ sản phẩm gồm 1 bảng gỗ cứng được viền kim loại, nhằm đảm bảo cho sản phẩm giữ nguyên
                được hình dáng cả khi bị rơi rớt. Phần phi tiêu có tay cầm bằng nhựa cứng và đầu nhọn bằng kim loại,
                cho người dùng có thể dễ dàng phóng và ghi phi tiêu vào bảng. Thiết kế 2 mặt độc đáo Phần bảng gỗ
                được thiết kế mặt số khác nhau ở cả 2 mặt, giúp cho người dùng có thể thay đổi cách chơi một cách
                linh động và lý thú. Phần mặt số được gai công kĩ lưỡng, sắc nét và giữ nguyên được màu sắc vốn có sau một thời gian sử dụng. Kích thước nhỏ gọn và tiện lợi Sản phẩm được thiết kế nhỏ gọn với phần móc treo chắc chắn, giúp cho người dùng có thể treo sản phẩm ở bất cứ đâu trong gia đình, nơi làm việc và học tập cá nhân. Người dùng có thể chơi cùng bạn bè, đồng nghiệp vào bất cứ khi nào cảm thấy căng thẳng, buồn phiền,…',
                'anh_dai_dien' => 'uploads/phi_tieu.jpg',
                'trang_thai' => '1'
            )
        );

        Sanpham::create(
            array(
                'ten_san_pham' => 'Đồ chơi Con quay giảm Stress 3 cánh -hàng nhập khẩu  ',
                'id_m' => '4',
                'ma_danh_muc' => '10',
                'so_luong_ton_kho' => '120',
                'don_gia' => '59000',
                'xuat_xu' => 'Việt Nam',
                'mo_ta' => 'Giảm căng thẳng, áp lực
                            Giúp thoải mái, giải toả căng thẳng
                            Giúp tăng tính kiên nhẫn và khả năng tập trung.
                            Trò chơi
                            Luyện tập kỹ năng
                            Nhỏ gọn
                            Chất liệu: nhựa',
                'anh_dai_dien' => 'uploads/con_quay_dong.jpg',
                'trang_thai' => '1'
            )
        );

        

        
    }
}
