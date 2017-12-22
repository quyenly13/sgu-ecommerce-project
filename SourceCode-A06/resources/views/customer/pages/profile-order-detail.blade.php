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
                                    <li class=""> <a href="{{ route('password') }}">Mật khẩu</a></li>
                                    <li class="active"> <a href="{{ route('history-order') }}">Lịch sử mua hàng</a></li>
                                
                            
                                </ul>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="col-xs-12 col-md-8 col-lg-9">
                        <section class="section latest-deals-area">
                            <div class="main-wrap">
                                <div class="user-info">
                                    <div class="am-cf am-padding">
                                        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">Lịch sử mua hàng </strong></div>
                                    </div>
                                    <hr/>
                                    <div class="">
                                        
                                            <table class="profile-order-list mb-30 ml-20">
                                            <thead class="panel t-uppercase" >
                                                <tr>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Số lượng</th>
                                                    <th>Thành tiền</th>
                                                    <th>Trạng thái</th>
                                                    <th></th>
                                                </tr>
                                                
                                            </thead>
                                            <tbody>

                                                @foreach ($cthd as $item)
                                                
                                                <tr>
                                                    <td>{{$item->id_sp}}</td>
                                                    <td>{{$item->so_luong}}</td>
                                                    <td>{{$item->tong_tien}}</td>
                                                    <td>{{$item->trang_thai}}</td>
                                                    <td></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        
                                        
                                    </div>
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