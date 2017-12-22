@extends('merchant-webmaster-master-layout.layout')
@section('menubar')
@section('loggin-user')
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
   {{  Auth::guard('webmaster')->user()->email}}<span class="caret"></span>
    </a>

    <ul class="dropdown-menu" role="menu">
        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Đăng xuất
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>

        <li>
            <a href="{{ route('suathongtinwebmaster',['id'=>Auth::guard('webmaster')->user()->id]) }}">
                Thông tin cá nhân
            </a>
        </li>
    </ul>
</li>

@endsection
@section('menubar')
                    <li style="padding: 10px 0 0;">
                        <a href="{{ route('webmaster.index')}}" class="waves-effect" id="trang-chinh"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Trang chính</span></a>
                    </li>

                    <li>
                        <a href="{{ route('quan-ly-danh-muc')}}" class="waves-effect" id="ql-danh-muc"><i class="fa fa-th-list fa-fw" aria-hidden="true"></i><span class="hide-menu">Quản Lý Danh Mục</span></a>
                    </li>
                    <li>
                        <a href="{{ route('xulykhoatk')}}" class="waves-effect" id="xu-li-khoa-tk"><i class="fa fa-unlock-alt fa-fw" aria-hidden="true"></i><span class="hide-menu">Xử Lý Khóa Tài Khoản</span></a>
                    </li>
                    <li>
                        <a href="{{ route('quanlinguoimua')}}" class="waves-effect" id="ql-nguoi-mua"><i class="fa fa-shopping-bag fa-fw" aria-hidden="true"></i><span class="hide-menu">Danh sách người mua</span></a>
                    </li>
                    <li>
                        <a href="{{ route('quanlinguoiban')}}" class="waves-effect" id="ql-nguoi-ban"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span class="hide-menu">Danh sách người bán</span></a>
                    </li>
                    <li>
                        <a href="{{ route('quan-ly-goi-tin')}}" class="waves-effect" id="ql-goi-tin"><i class="fa fa-cube fa-fw" aria-hidden="true"></i><span class="hide-menu">Quản lý gói tin</span></a>
                    </li>
                    <li>
                        <a href="{{ route('doanhthugoitin')}}" class="waves-effect" id="ql-tk-goi-tin"><i class="fa fa-money fa-fw" aria-hidden="true"></i><span class="hide-menu">Thống kê doanh thu mua gói tin</span></a>
                    </li>
                    <li>
                        <a href="{{ route('getdanhgia')}}" class="waves-effect" id="ql-tk-danh-gia"><i class="fa fa-star fa-fw" aria-hidden="true"></i><span class="hide-menu">Thống kê Đánh giá</span></a>
                    </li>
                    <li>
                        <a href="{{ route('getalldonhang')}}" class="waves-effect" id="ql-tk-dh"><i class="fa fa-file fa-fw" aria-hidden="true"></i><span class="hide-menu">Xem đơn đặt hàng</span></a>
                    </li>
@endsection
