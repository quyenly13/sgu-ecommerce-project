@component('mail::message')
# Kích hoạt tài khoản bán hàng tại ToyStrore.dev

Cảm ơn bạn đã đăng kí. Mời bạn nhấp vào 'Kích hoạt' bên dưới để hoàn tất đăng kí

<a href="{{route('sendEmailDone',['email'=>$merchant->email])}}">Kích hoạt</a>

Chân thành cảm ơn,<br>
{{ config('app.name') }}
@endcomponent
