

@component('mail::message')

# Cảm ơn bạn đã mua hàng!

Bạn vừa mua hàng thành công tại trang web <a href="{{route('home')}}">Toystore</a>

Đơn hàng đã đặt của người bán : {{$Merchant->ho_ten}}
<br>
Số điện thoại liên lạc :  {{$Merchant->sdt}}
<br>

@component('mail::table')

| Tên SP                                  |Số lượng               | Đơn giá (VNĐ)                    |Tổng Tiền (VNĐ)                  |
| ----------------------------------------|:---------------------:|---------------------------------:|--------------------------------:|
@foreach($lst_cthd as $ct)
| {{ $ct->sanpham->ten_san_pham }}        |    {{ $ct->so_luong}}| {{ $ct->sanpham->don_gia }}| {{ $ct->tong_tien }} |
@endforeach
| &nbsp;   |&nbsp;|                                                                 **Tổng cộng**    | {{$tonghd}} VNĐ

@endcomponent

Để đánh giá chất lượng dịch vụ, sản phẩm của người bán, mời bạn click vào link sau đây
<a href="{{ route('getratingMerchant',['id_hd'=>$id_hd,'id_c'=>$id_c,'id_m'=>$Merchant->id_m]) }}">Đánh giá người bán</a>
Xin Cảm ơn bạn nhiều,
ToyStore

@endcomponent
