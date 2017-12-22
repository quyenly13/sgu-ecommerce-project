@extends('customer.layouts.main')

@section('title', 'Thông tin cá nhân')

@section('content')
    <div class="container">
        <div class="menu-profile">
            <ul>
                <li class="person active">
                    <strong>Thông tin cá nhân</strong>
                </li>
                <li class="person">
                    <ul>
                        <li class="active"> <a href="{{ url('/user/setting') }}">Thông tin cơ bản</a></li>
                       
                
                    </ul>
                </li>
                <li class="person">
                    <strong>Lịch sử mua hàng</strong>
                
                    
                </li>
                <li class="person">
                    <ul>
                        <li><a href="{{ url('user/orders') }}">Đang xử lí</a></li>
                        <li><a href="{{ url('user/orders') }}">Đã hoàn tất</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="main-wrap">
            @yield('customer-info')
        </div>
    </div>
   
    
@endsection

