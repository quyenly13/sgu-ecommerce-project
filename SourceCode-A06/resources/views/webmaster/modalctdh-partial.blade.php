<div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>

       <h2>THÔNG TIN KHÁCH HÀNG</h2>
       <table class="table">
         <thead>
           <tr>
             <tr>
                 <th class="product-name">Tên Khách Hàng</th>
                 <th class="product-price">Địa Chỉ</th>
                 <th class="product-subtotal">SĐT</th>
             </tr>
           </tr>
         </thead>
         <tbody>
             <tr class="cart_item">

                 <td class="product-name">
                   <a href="{{route('thong_tin_customer_admin',['id'=> $hd->id_c])}}">{{ $hd->customer->ho_ten}}</a>
                 </td>
                 <td class="product-name">
                      {{ $hd->dia_chi}}
                 </td>
                 <td class="product-name">
                     {{ $hd->customer->sdt}}
                 </td>
             </tr>

         </tbody>
       </table>

       <h2>SẢN PHẨM ĐẶT MUA</h2>
       <table class="table table-hover" id="myTable_detail">
         <thead>
             <tr>
                <th>Sản phẩm</th>
                <th>Người bán</th>
                <th>Trạng thái</th>
                <th>SL</th>
                <th>Đơn giá (VNĐ)</th>
                <th>Tổng Tiền (VNĐ)</th>
            </tr>
         </thead>
         <tbody>
           <?php $sum = 0; ?>
           @foreach ($detail_invoice as $item)
           <tr>


                   <tr>
                       <td> {{ $item->sanpham->ten_san_pham }}</td>
                       <td><a href="{{route('thong_tin_merchant_admin',['id'=> $item->merchant->id_m])}}">{{ $item->merchant->ten_dang_nhap }} </a></td>
                       <?php $tt = $item->checkStatus($item->trang_thai); ?>
                       @if($tt == "Đang chờ xử lý" )
                         <td> <span class="label label-default"> {{$tt}}</span> </td>
                       @elseif($tt == "Đang giao" )
                         <td> <span class="label label-primary"> {{$tt}} </span> </td>
                         @elseif($tt == "Hoàn tất" )
                           <td> <span class="label label-success">  {{$tt}} </span> </td>
                           @else
                             <td> <span class="label label-danger"> {{$tt}} </span> </td>
                           @endif

                         <td> {{ $item->so_luong }} </td>
                       <td> {{ number_format($item->sanpham->don_gia,0) }} </td>
                        <td> {{ number_format($item->tong_tien,0) }} </td>
                   </tr>
                </tr>
                <?php $sum = $sum + $item->tong_tien; ?>
           @endforeach

         </tbody>

       </table>

       <br><span class="pull-right text-danger text-bold">Tổng Cộng: {{number_format($sum, 0,'', ',')}} VNĐ</span><br>

<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
