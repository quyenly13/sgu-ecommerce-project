
<div class="row">
    <?php $tongthu =0; $tongchi =0;  ?>

    <div class="panel panel-success" id="content_thu">
        <div class="panel-heading">Bảng thống kê đơn hàng</div>
        <div class="panel-body">
            <table id="bangthu" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Người đặt</th>
                        <th>Ngày đặt</th>
                        <th>Nơi nhận</th>
                        <th>Ghi chú của khách</th>
                        <th>SDT</th>
                        <th>Tổng tiền</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($list_invoice as $item)
                    <tr class="invoice_line" data-name="{{$item->ho_ten}}" data-stt="{{$item->trang_thai}}" data-id="{{$item->id}}" data-toggle="modal"
                        data-target="#detail_invoice">
                        <td>{{$item->ho_ten}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->dia_chi}}</td>
                        <td>{{$item->ghi_chu_KH}}</td>
                        <td>{{$item->SDT}}</td>
                        <td>{{ number_format($item->tong_tien, 0,'', ',') }}</td>

                    </tr>
                    <?php $tongthu += $item->tong_tien ?> @endforeach

                </tbody>
            </table>
            <h2>Tổng thu:
                <span id="tongthu">{{ number_format($tongthu,0,'',',') }}</span>
            </h2>
        </div>
    </div>
    <div class="panel panel-success" id="content_chi">
        <div class="panel-heading">Bảng thống kê mua gói tin</div>
        <div class="panel-body">
            <table id="bangchi" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Mã phiếu</th>
                        <th>Tên gói tin</th>
                        <th>Số lượng</th>
                        <th>Đơn giá (VNĐ)</th>
                        <th>Thành tiền (VNĐ)</th>
                        <th>Ngày giao dịch</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($list_invoice_buy_post as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>Gói tin {{$item->don_gia}}</td>
                        <td>{{$item->so_luong}}</td>
                        <td>{{number_format($item->don_gia, 0,'', ',')}}</td>
                        <td>{{number_format($item->tong_tien, 0,'', ',') }}</td>
                        <td>{{$item->created_at}}</td>

                    </tr>
                    <?php $tongchi += $item->tong_tien ?> @endforeach

                </tbody>
            </table>
            <h2>Tổng chi:
                <span id="tongchi">{{ number_format($tongchi,0,'',',') }}</span>
            </h2>
        </div>
    </div>
    <h2 class="text-danger">Tổng lợi nhuận: {{number_format($tongthu - $tongchi,0,'',',')}}</h2>


</div>
