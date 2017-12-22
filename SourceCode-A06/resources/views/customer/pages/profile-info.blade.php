@extends('customer.layouts.main')

@section('title', 'Thông tin cá nhân')

@section('content')
<main id="mainContent" class="main-content">
    <div class="page-container ptb-10">
        <div class="container">
            <div class="section deals-header-area">
                <div class="row row-tb-20">
                    <div class="menu-profile col-xs-12 col-md-4 col-lg-3">
                        <ul>
                            <li class="person">
                                <strong>Thông tin cá nhân</strong>
                            </li>
                            <li class="person">
                                <ul>
                                    <li class="active"> <a href="{{ route('profile') }}">Thông tin cơ bản</a></li>
                                    <li class=""> <a href="{{ route('password') }}">Mật khẩu</a></li>
                                    <li class=""> <a href="{{ route('history-order') }}">Lịch sử mua hàng</a></li>


                                </ul>
                            </li>

                        </ul>
                    </div>
                    <div class="col-xs-12 col-md-8 col-lg-9">
                        <section class="section latest-deals-area">
                            <div class="main-wrap">
                                <div class="user-info">
                                    <div class="am-cf am-padding">
                                        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">Thông tin cơ bản</strong></div>
                                    </div>
                                    <hr/>
                                <div class="info-main">
                                    @if (session()->has('status') > 0)
                                        <div class="am-alert am-alert-success" data-am-alert>
                                            <button type="button" class="am-close">&times;</button>
                                            <p>{{ session('status') }}</p>
                                        </div>
                                    @endif
                                    @if ($errors->count() > 0)
                                        <div class="am-alert am-alert-danger" data-am-alert>
                                            <button type="button" class="am-close">&times;</button>
                                            <p>{{ $errors->first() }}</p>
                                        </div>
                                    @endif
                                    <form class="am-form am-form-horizontal" method="post" action="{{ route('updateProfile') }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <input type="hidden" name="avatar" value="">
                                        <div class="am-form-group">
                                            <label for="user-name2" class="am-form-label">Tên đăng nhập: </label>
                                            <div class="am-form-content">
                                                <input type="text" id="username" placeholder="" name="username" value="{{ $cus->ten_dang_nhap }}" >
                                            </div>
                                        </div>
                                        <div class="am-form-group">
                                            <label for="user-name2" class="am-form-label">Họ và tên: </label>
                                            <div class="am-form-content">
                                                <input type="text" id="name" placeholder="" name="name" value="{{ $cus->ho_ten }}"  pattern="/[^a-zA-Z_\x{00C0}-\x{00FF}\x{1EA0}-\x{1EFF}]/u">
                                            </div>
                                        </div>
                                        <div class="am-form-group">
                                            <label for="user-name2" class="am-form-label">Số điện thoại: </label>
                                            <div class="am-form-content">
                                                <input type="text"  placeholder="" name="phoneNum" value="{{$cus->sdt}}" >
                                            </div>
                                        </div>
                                        <div class="am-form-group">
                                            <label class="am-form-label">Giới tính</label>
                                            <div class="am-form-content sex">
                                                <label class="am-radio-inline">
                                                    <input type="radio" name="sex" value="1" {{ $cus->gioi_tinh == 1 ? 'checked' : ''}} data-am-ucheck> Nam
                                                </label>
                                                <label class="am-radio-inline">
                                                    <input type="radio" name="sex" value="0"  {{ $cus->gioi_tinh == 0 ? 'checked' : ''}} data-am-ucheck> Nữ
                                                </label>
                                            </div>
                                        </div>
                                        <div class="am-form-group">
                                            <label for="user-name2" class="am-form-label">Địa chỉ: </label>
                                            <div class="am-form-content">
                                                <input type="text" id="address" placeholder="" name="address" value="{{$cus->dia_chi}}">
                                            </div>
                                        </div>

                                        <div class="am-form-group">
                                            <label for="user-email" class="am-form-label">Email: </label>
                                            <div class="am-form-content">
                                                <input id="email" placeholder="" type="email" value="{{$cus->email}}" disabled="disabled">
                                            </div>
                                        </div>
                                        <div class="info-btn">
                                            <button type="submit" class="btn btn-rounded btn-lg">Cập nhật</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </secton>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
