@extends('customer.layouts.main')

@section('title', 'Xác nhận đặt hàng')

@section('content')
<div class="container" id="checkout">
    <form action="{{ url('/')}}/checkout" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 info">
            <div class="row">
                <p class="title-info">Thông tin giao hàng</p>
                <!-- <a class="title-change" role="button" onclick="">NHẤP VÀO ĐÂY ĐỂ CẬP NHẬT</a> -->
                <!-- <textarea rows="3" cols="38" type="text" id="address" class="input-update" name="sdt" placeholder="Địa chỉ"></textarea> -->

            </div>
           
            <p>Người nhận: <strong>{{ Auth::guard('customer')->user()->ho_ten }}</strong></p>
            <p>Số diện thoại: <strong>{{ Auth::guard('customer')->user()->sdt }}</strong></p>
            <p>Địa chỉ: <input type="text" class="new-address" name="address"value="{{ Auth::guard('customer')->user()->dia_chi }}"><i class="notes text-danger">*Bạn có thể thay đổi địa chỉ giao hàng</i></p>
            <p>Ghi chú(nếu có): <input type="text" class="new-address" name="ghi_chu_KH" placeholder="Ghi chú giao hàng"><i class="notes text-danger">Ghi chú sẽ giúp việc giao hàng tốt hơn</i></p>
           
    
            <!-- <strong class="notes">Bạn có thể thay đổi địa chỉ giao hàng</strong> -->

        </div>
    </div>
    <div class="row">
        <div class="ordered-pro col-md-10 col-md-offset-1">
            <div class="row title-info">Sản phẩm đã đặt</div>
            <table id="cart_list" class="cart-list mb-0 table table-hover">
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
                    @foreach ($cartItems as $item)
                        <tr class="panel alert">
                            <td>
                                <div class="media-body valign-middle">
                                    <h6 class="title mb-15 t-uppercase">
                                        <a href="">
                                            {{ $item->name }}
                                        </a>
                                    </h6>
                                </div>
                            </td>
                            <td>
                                {{ $item->qty }}
                            </td>
                            <td>{{ number_format($item->price,0)}} </td>
                            <td>{{ number_format($item->subtotal,0) }}</td>
                            <!--  -->

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="cart-price col-md-10 col-md-offset-1">
            <div class="t-left total">
                <strong class="t-uppercase">Tổng cộng:  <span class="total-num">{{ number_format(Cart::total(),0) }} VNĐ</span></strong>
            </div>
            <div class="t-right btn-checkout">
                <a href="{{ route('gio-hang') }}" class="btn btn-rounded btn-lg">Quay lại giỏ hàng</a>
                <input type="submit" value="Xác nhận" class="btn btn-rounded btn-lg"/>
            </div>

        </div>

    </div>

    </form>

</div>
<script>
    $("#showPopup").on('click', function() {
        document.getElementById('pop-up').style.display = "block";
    });
</script>
@endsection

@section('script')



@endsection
