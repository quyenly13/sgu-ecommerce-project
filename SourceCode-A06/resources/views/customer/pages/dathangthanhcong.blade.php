@extends('customer.layouts.main')

@section('title', 'Xác nhận đặt hàng')

@section('content')
<div class="container" id="checkout">
  <div class="row">
      <div class="col-md-10 col-md-offset-1 thank-you">
        <div class="mt-20">
          @if(Session::has('error'))
            <div class="alert alert-danger">
              <strong>Đơn hàng gửi thất bại! Vui lòng quay lại sau </strong>
            </div>
          @endif
          @if(Session::has('success'))
          <div class="alert alert-success">
            <strong> Đơn hàng đã được gửi đi ! Cảm ơn bạn đã đặt hàng ! </strong>
          </div>
          @endif
        </div>
        <div class="mt-20 mb-20">
          <a href="{{route('home')}}" class="btn btn-success"> TRỞ VỀ TRANG CHỦ</a>
        </div>   
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')



@endsection
