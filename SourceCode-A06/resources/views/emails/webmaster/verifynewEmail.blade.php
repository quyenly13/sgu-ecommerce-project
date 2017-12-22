@component('mail::message')
# Xác nhận email mới tại ToyStrore.dev

Bạn vừa gửi yêu cầu thay đổi email mới
Mời bạn nhấp vào nút bên dưới để hoàn tất đăng kí

<a href="{{route('NewWebmasterEmailDone',['id'=>$quantrivien->id,'email'=>$new_email])}}">Xác nhận</a>

Chân thành cảm ơn,<br>
{{ config('app.name') }}
@endcomponent
