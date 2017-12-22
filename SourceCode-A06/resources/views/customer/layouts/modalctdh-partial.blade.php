<div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
       <h4 class="modal-title">CHI TIẾT ĐƠN HÀNG</h4>
     </div>
     <div class="modal-body">


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
                     {{ $hd->customer->ho_ten}}
                   </td>
                   <td class="product-name">
                        {{ $hd->dia_chi}}
                   </td>
                   <td class="product-name">
                       {{ $hd->SDT}}
                   </td>
               </tr>

           </tbody>
         </table>

  <h2>SẢN PHẨM ĐẶT MUA</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <tr>
            <th class="product-name">Sản Phẩm</th>
            <th class="product-name">Người bán</th>
            <th class="product-name">Trạng thái</th>
            <th class="product-quantity">SL</th>
            <th class="product-subtotal">Tổng cộng (VNĐ)</th>
        </tr>
      </tr>
    </thead>
    <tbody>

      @foreach ($cthd as $item)

      <tr>
          <td> {{ $item->sanpham->ten_san_pham }}</td>
          <td><a href="{{route('product-mer',['id'=> $item->merchant->id_m])}}">{{ $item->merchant->ten_dang_nhap }} </a>
          {{ $item->merchant->sdt}}</p></td>
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
          <td> {{ number_format($item->tong_tien,0) }} </td>
      </tr>
      @endforeach


    </tbody>
  </table>
</div>

<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
      </div>
