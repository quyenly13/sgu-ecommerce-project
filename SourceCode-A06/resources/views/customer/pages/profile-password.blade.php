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
                                    <li class=""> <a href="{{ route('profile') }}">Thông tin cơ bản</a></li>
                                    <li class="active"> <a href="{{ route('password') }}">Mật khẩu</a></li>
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
                                        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">Thay đổi mật khẩu</strong></div>
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
                                    <form class="am-form am-form-horizontal" method="post" action="{{ route('updatePassword')}}">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <div class="am-form-group">
                                            <label for="user-name2" class="am-form-label am-label-password ">Mật khẩu hiện tại: </label>
                                            <div class="am-form-content">
                                                <input type="password" id="" placeholder="" name="old_password" value="">
                                            </div>
                                        </div>
                                        <div class="am-form-group">
                                            <label for="user-name2" class="am-form-label am-label-password ">Mật khẩu mới: </label>
                                            <div class="am-form-content">
                                                <input type="password" id="" placeholder="" name="password" value="">
                                            </div>
                                        </div>
                                        <div class="am-form-group">
                                            <label for="user-name2" class="am-form-label am-label-password">Nhập lại mật khẩu mới: </label>
                                            <div class="am-form-content">
                                                <input type="password" id="" placeholder="" name="password_confirmation" value="">
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