@component('mail::message')
# Xác nhận tài khoản bán hàng tại ToyStrore.dev

Cảm ơn bạn đã đăng kí. Mời bạn nhấp vào nút bên dưới để hoàn tất đăng kí

<a href="{{route('sendWebmasterEmailDone',['email'=>$quantrivien->email])}}">Xác nhận</a>

Chân thành cảm ơn,<br>
{{ config('app.name') }}
@endcomponent
