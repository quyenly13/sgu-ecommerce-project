

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
  <table class="table table-hover" id="myTable_detail">
    <thead>
        <tr>
           <th>Tên sản phẩm</th>
           <th>Ảnh</th>
           <th>Số lượng</th>
           <th>Đơn giá (VNĐ)</th>
       </tr>
    </thead>
    <tbody>

      @foreach ($detail_invoice as $item)
      <tr>

               <td>{{$item->ten_san_pham}}</td>
               <td><img src="/{{$item->anh_dai_dien}}" width="100px"/></td>
               <td>{{$item->so_luong}}</td>
               <td class="text-right">{{number_format($item->don_gia, 0,'', ',')}}</td>
           </tr>
      @endforeach

    </tbody>

  </table>

  <br><span class="pull-right text-danger text-bold">Tổng tiền: {{number_format($total, 0,'', ',')}}</span><br>
