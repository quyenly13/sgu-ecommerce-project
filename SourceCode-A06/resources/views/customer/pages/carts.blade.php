@extends('customer.layouts.main')

@section('title', 'Giỏ hàng')

@section('content')
<main id="mainContent" class="main-content">
    <div class="page-container">
        <div class="container">
            <div class="cart-area ptb-60">
                <div class="container">
                    <div class="cart-wrapper">
                      @if(Session::has('error'))
                        <div class="alert alert-danger"> {{ Session::get('error') }}</div>
                      @endif
                        <h3 class="h-title mb-30 t-uppercase">Chi tiết giỏ hàng</h3>
                        @if (count($cartItems) === 0)
                                <p>Hiện tại giỏ hàng của bạn không có sản phẩm nào</p>
                                <div class="t-left">
                                 <a href="{{ route('home') }}" class="btn btn-rounded btn-lg">Mua hàng</a>
                                </div>
                            @else
                        <table id="cart_list" class="cart-list mb-10 table-hover">
                            <thead class="panel t-uppercase">
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá (VNĐ)</th>
                                <th>Thành tiền (VNĐ)</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody id="cars_data">
                            <form action="">
                                @foreach ($cartItems as $item)
                                <tr class="panel alert">
                                    <td>
                                        <div class="media-body valign-middle">
                                            <h6 class="title mb-15 t-uppercase">
                                                <a href="{{ route('chi-tiet-san-pham', $item->id) }}">
                                                    {{ $item->name }}
                                                </a>
                                            </h6>
                                        </div>
                                    </td>
                                    <td>
                                        <dd>
                                            <a href="{!!  route('minus-to-cart', ['id'=>$item->rowId]) !!}"><div class="value-button" style="margin-right: -5px" id="decrease" value="Decrease Value">-</div></a>
                                            <input type="number" size="4" id="qty" name="{{ $item->rowId }}" class="input-text qty text" title="Qty"  value="{{ $item->qty }}" min="0" step="1">
                                            <a href="{!!  route('plus-to-cart', ['id'=>$item->rowId]) !!}"><div class="value-button" style="margin-left: -5px" id="increase" value="Increase Value">+</div></a>
                                        </dd>
                                        <!-- <input class="quantity-label" type="number" value="{{ $item->qty }}"> -->
                                    </td>
                                    <td>{{ number_format($item->price,0)}} </td>
                                    <td>{{ number_format($item->subtotal,0) }}</td>
                                    <td>
                                        <a class="close" href="{{url('/gio-hang/xoa-san-pham')}}/{{$item->rowId}}"><i class="fa fa-trash-o"></i></a>
                                    </td>

                                </tr>
                                @endforeach
                            </form>


                            </tbody>
                        </table>
                        <div class="cart-price">
                            <ul class="panel mb-20">
                                <li>
                                    <div class="item-name">
                                        <strong class="t-uppercase">Tổng cộng</strong>
                                    </div>
                                    <div class="price">
                                        <span>{{ number_format(Cart::total(),0) }} VNĐ</span>
                                    </div>
                                </li>
                            </ul>
                           
                            <div class="t-right">
                             <a href="{{ route('home') }}" class="btn btn-rounded btn-lg">Tiếp tục mua hàng</a>
                                <a href="{{ route('checkout') }}" class="btn btn-rounded btn-lg" style="margin-left: 20px">Đặt hàng</a>
                            </div>
                           
                           
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('script')
<script>
    // function increaseValue() {
    // var value = parseInt(document.getElementById('qty').value, 10);
    // value = isNaN(value) ? 1 : value;
    // value++;
    // document.getElementById('qty').value = value;
    // }
    //
    // function decreaseValue() {
    // var value = parseInt(document.getElementById('qty').value, 10);
    // value = isNaN(value) ? 1 : value;
    // value < 1 ? value = 1 : '';
    // value--;
    //
    // document.getElementById('qty').value = value;
    $(document).ready(function() {
  $("#qty").change(function(event) {
    event.preventDefault();
    var rowid =  $(this).attr('name');
    var new_qty =  $(this).val();
    $.ajax({
      url: '/gio-hang/sua-sl-san-pham/',
      type: 'GET',
      data: {rowId: rowid,qty: new_qty },
      success:function(data) {
      location.reload();
      //console.log('du');
      }
  })
});
});
</script>
@endsection
