

@component('mail::message')

# Cảm ơn bạn đã mua hàng!

Bạn vừa đặt hàng thành công tại trang web <a href="{{route('home')}}">Toystore</a>

Dưới đây là thông tin đơn hàng bạn vừa đặt
<br>


## Thông tin đơn hàng

@component('mail::table')

| Thông tin              | &nbsp;            |
| -----------------------|:-----------------:|
| Tên người mua          | {{$ho_ten}}       |
| Địa chỉ giao           | {{$hd->dia_chi }} |
| Điện thoại             | {{$hd->SDT}}      |


@endcomponent

##Chi tiết đơn hàng

@component('mail::table')

| Tên SP                                  |Số lượng               | Đơn giá (VNĐ)                    |Tổng Tiền (VNĐ)                  |
| ----------------------------------------|:---------------------:|---------------------------------:|--------------------------------:|
@foreach($ct_hd as $ct)
| {{ $ct->sanpham->ten_san_pham }}        |    {{ $ct->so_luong}}| {{ $ct->sanpham->don_gia }}| {{ $ct->tong_tien }} |
@endforeach
| &nbsp;   |&nbsp;|                                                                 **Tổng cộng**    | {{$hd->tong_tien}} VNĐ

@endcomponent


Xin Cảm ơn bạn nhiều đã mua hàng tại trang web chúng tôi !,
ToyStore

@endcomponent
