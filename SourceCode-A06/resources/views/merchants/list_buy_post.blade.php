@extends('merchants.master-layout.master-layout')
@section('title', 'Lịch sử mua tin')
@section('title_page')
Danh sách hóa đơn mua gói tin
@endsection
@section('content')

<table id="tableListBuy"  class="display" cellspacing="0" width="100%">
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
                <td>Gói tin {{$item->don_gia}} VNĐ</td>
                <td>{{$item->so_luong}}</td>
                <td>{{number_format($item->don_gia, 0,'', ',')}}</td>
                <td>{{number_format($item->tong_tien, 0,'', ',') }}</td>
                <td>{{$item->created_at}}</td>

            </tr>
        @endforeach

        </tbody>
    </table>
  <script>
  $(document).ready(function(){
    $('#side-menu').children('a').each(function() {
            if($(this).hasClass('active'))
      {
        $(this).removeClass('active');
      }
    })
    $('#lsmuatin').addClass('active');
  });
  </script>
@endsection
