@extends('merchant-webmaster-master-layout.layout')
@section('loggin-user')
<ul class="nav navbar-top-links navbar-right">
                        <!-- Authentication Links -->

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                               {{  Auth::guard('merchant')->user()->ten_dang_nhap}}<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                          <i class="fa fa-sign-out" aria-hidden="true"></i>  Đăng xuất
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                    </ul>
@endsection
@section('menubar')
    <li style="padding: 10px 0 0;">
        <a href="/merchant" class="waves-effect" id="trang-chu"><i class="fa fa-home fa-fw" aria-hidden="true"></i><span class="hide-menu">  Trang chủ</span></a>
    </li>
    <li>
        <a href="/merchant/thong-tin-ca-nhan" class="waves-effect" id="thongtin"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span class="hide-menu">  Thông tin người dùng</span></a>
    </li>
    <li>
        <a href="/merchant/danh-sach-don-hang" class="waves-effect" id="ql-hd-bh"><i class="fa fa-list fa-fw" aria-hidden="true" ></i><span class="hide-menu">  Quản lý hóa đơn bán hàng</span></a>
    </li>
    <li>
        <a href="/merchant/danh-sach-mua-tin" class="waves-effect" id="lsmuatin"><i class="fa fa-list fa-fw" aria-hidden="true"></i><span class="hide-menu">  Danh sách hóa đơn mua tin</span></a>
    </li>
    <li>
        <a href="/merchant/dang-tin" class="waves-effect"  id="dang-tin"><i class="fa fa-cube fa-fw" aria-hidden="true"></i><span class="hide-menu">  Đăng tin</span></a>
    </li>
    <li>
        <a href="/merchant/mua-goi-tin" class="waves-effect" id="mua-gt"><i class="fa fa-money fa-fw" aria-hidden="true" ></i><span class="hide-menu">  Mua gói tin</span></a>
    </li>
    <li>
        <a href="/merchant/ton-kho" class="waves-effect" id="ton-kho"><i class="fa fa-cubes fa-fw" aria-hidden="true"></i><span class="hide-menu">  Tồn kho</span></a>
    </li>
    <li>
        <a href="/merchant/thong-ke" class="waves-effect"  id="tk-doanh-thu" ><i class="fa fa-line-chart fa-fw" aria-hidden="true" ></i><span class="hide-menu">  Thống kê doanh thu</span></a>
    </li>

@endsection
