 <header id="mainHeader" class="main-header">

    <!-- Top Bar -->
    <div class="top-bar bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 is-hidden-sm-down">
                    <ul class="nav-top nav-top-left list-inline t-left">

                    </ul>
                </div>
                <div class="col-sm-12 col-md-8">
                    <ul class="nav-top nav-top-right list-inline t-xs-center t-md-right">
                        <li><a href="{{ route('merchant.login')}}"><i class="fa fa-money fa-fw"></i>Bán hàng</a></li>
                        @if(Auth::guard('customer')->check())
                            <li>
                                <a href="{{ route('profile') }}"><i class="fa fa-user fa-fw"></i> {{ Auth::guard('customer')->user()->ten_dang_nhap }}</a>
                            </li>
                            <li>
                                <a href="javascript:;" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i>Đăng xuất</a>
                            </li>
                        @else
                            <li><a href="{{ url('/dang-nhap')}}"><i class="fa fa-sign-in fa-fw"></i>Đăng nhập</a>
                            </li>
                            <li><a href="{{url('/dang-ki')}}"><i class="fa fa-user-plus fa-fw"></i>Đăng kí</a>
                            </li>
                        @endif

                    </ul>
                </div>
                <form id="logout-form" action="{{ route('dang-xuat')}}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
    <!-- End Top Bar -->
          <!-- End Top Bar -->

          <!-- Header Header -->
          <div class="header-header bg-white">
              <div class="container">
                  <div class="row row-rl-0 row-tb-20 row-md-cell">
                      <div class="brand col-md-3 t-xs-center t-md-left valign-middle">
                          <a href="{{ url('/') }}" class="logo" title="Trang chủ">
                              <img src="{{ asset('assets/customer/images/logo.png') }}" alt="" width="250">
                          </a>
                      </div>
                      <div class="header-search col-md-9">
                          <div class="row row-tb-10 ">
                              <div class="col-sm-8">
                                  <form class="search-form" method="get" action=" {{route('searchBox')}}">
                                      <div class="input-group">
                                          <input type="text" name="keyword" class="form-control input-lg search-input" placeholder="Nhập từ khóa cần tìm..." required="required">
                                          <div class="input-group-btn">
                                              <div class="input-group">
                                                  <div class="input-group-btn">
                                                      <button type="submit" class="btn btn-lg btn-search btn-block">
                                                          <i class="fa fa-search font-16"></i>
                                                      </button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                              <div class="col-sm-4 t-xs-center t-md-right">
                                  <div class="header-cart">
                                      <a href="{{ route('gio-hang') }}" title="Giỏ hàng">
                                          <span class="icon lnr lnr-cart"></span>
                                          <div><span class="cart-number" id="cart-num" style="padding-top: 3px;">{{ Cart::count() }}</span>
                                          </div>

                                      </a>
                                  </div>
                                  <!-- <div class="header-wishlist ml-20">
                                      <a href="wishlist.html" title="Yêu thích">
                                          <span class="icon lnr lnr-heart font-30"></span>
                                      </a>
                                  </div> -->
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- End Header Header -->


      </header>
