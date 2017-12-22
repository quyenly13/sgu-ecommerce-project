@extends('customer.layouts.main')

@section('title', 'Thông tin sản phẩm')
@section('content')
<main id="mainContent" class="main-content">
    <div class="page-container ptb-10">
        <div class="container">
            <div class="section deals-header-area">
                <div class="row row-tb-20">
                    @include('customer.components.menu_categories')

                    <div class="col-xs-12 col-md-8 col-lg-9">
                        <section class="section latest-deals-area">
                            <div class="item-inform">
                                <div class="clearfixLeft" id="clearcontent">
                                    <div class="box">
                                        <!-- image products -->
                                        <div class="tb-booth tb-pic tb-s310">
                                            <img src="/{{$product->anh_dai_dien}}" alt="" id="jqzoom" style="width: 100%" />
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfixRight">

                                  @if(Session::has('error'))
                                    <div class="alert alert-danger">{{Session::get('error')}}</div>
                                  @endif
                                    <div class="tb-detail-hd">
                                        <h3>
                                            {{$product->ten_san_pham}}
                                        </h3>
                                    </div>
                                    <div class="tb-detail-list">
                                        <div class="ratings mb-10">
                                            <!-- <span class="stars" data-rating="3.5" data-num-stars="5" ></span> -->
                                            <p style="color: #000; margin-bottom: 3px; margin-top: 8px;">Tên cửa hàng: <a href="{{ route('product-mer', $merchant->id_m) }}"><strong>{{$merchant->ten_dang_nhap}}</strong> </a></p>
                                            <span class="result-rating" data-rating="{{ $avgScore }}"></span>
                                             <span style="color: #000; margin-left: 5px;">{{ $numRating}} người đánh giá</span>
                                        </div>
                                    <div>


                                        @if($product->so_luong_ton_kho>0)
                                        <p id="stock_num">Hiện còn: <strong>{{$product->so_luong_ton_kho }}</strong></p>
                                        @else
                                          Hiện còn: <div class="label label-danger">Hết Hàng</div>
                                        @endif
                                        <p>Giá: <strong>  {{ number_format($product->don_gia,0)}} VNĐ</strong></p>
                                    </div>
                                    <dl class="iteminfo_parameter sys_item_specpara">
                                        <dd>
                                            <div class="theme-popover-mask"></div>
                                                <div class="theme-popover">
                                                    <div class="theme-popbod dform">
                                                        <div class="theme-signin-left">
                                                    <!-- BEGIN DONE -->
                                                        @if($product->so_luong_ton_kho>0)
                                                            <form action="{{url('/gio-hang/them-san-pham')}}/<?php echo $product->id; ?>">
                                                                <span>
                                                                    <div class="theme-options">
                                                                        <div class="cart-title number"><p>Số lượng:</p>  </div>

                                                                            <dd>
                                                                                <div class="value-button" style="margin-top: -4px"  id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                                                                <input name="qty" type="number" id="qty" value="1" min="1" max="{{$product->so_luong_ton_kho }}"/>
                                                                                <div class="value-button" style="margin-top: -4px" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
                                                                            </dd>
                                                                        </div>
                                                                    <div class="clearfix tb-btn tb-btn-basket">
                                                                        <button class="btn btn-fefault cart" id="addToCart"><i class="fa fa-shopping-cart" style="margin-right: 5px"></i>Thêm vào giỏ</button>
                                                                    </div>

                                                                    <input type="hidden" value="<?php echo $product->id; ?>" id="proDum"/>
                                                                </span>
                                                            </form>
                                                        @endif
                                                        </div>
                                                        <!-- END DONE -->
                                                    </div>
                                                </div>
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="introduce">
                                <div class="introduceMain">
                                    <div class="am-tabs" data-am-tabs>
                                        <ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
                                            <li class="am-active">
                                                <!-- <a href="#"> -->
                                                    <span class="index-needs-dt-txt" style="font-size: 16px;">Thông tin chi tiết</span>
                                                <!-- </a> -->
                                            </li>
                                        </ul>
                                        <div class="am-tabs-bd">
                                            <div class="am-tab-panel am-fade am-in am-active">
                                                <div class="details" style="padding-left: 25px;">
                                                    <div class="attr-list-hd after-market-hd">
                                                        <h4>{{ $product->ten_san_pham}}</h4>
                                                    </div>
                                                    <div class="twlistNews">
                                                        <h5>Xuất xứ: <strong>{{ $product->xuat_xu }}</strong></h5>
                                                        <h5>Mô tả: </h5>
                                                        <p>{{$product->mo_ta}}</p>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                    <!-- detail-->

                    <div class="introduceMain">
                        <div class="am-tabs" data-am-tabs>
                            <ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
                                <li class="am-active">
                                    <!-- <a href="#"> -->
                                        <span class="index-needs-dt-txt" style="font-size: 16px;">Các sản phẩm liên quan</span>
                                    <!-- </a> -->
                                </li>
                            </ul>
                            <div class="am-tabs-bd">
                                <div class="am-tab-panel am-fade">
                                  @foreach($sp_lienquan as $product)
                                  <div class="col-sm-6 col-lg-4">
                                      <div class="deal-single panel" style="margin-top: 20px; border: 1px solid #cdcdcd; margin-bottom: 20px;">
                                          <a href="{{ route('chi-tiet-san-pham', $product->id) }}">
                                              <figure class="deal-thumbnail embed-responsive embed-responsive-16by9" style="border-bottom: 1px solid #cdcdcd;">
                                                  <img src="/{{$product->anh_dai_dien}}" alt="" id="jqzoom" />
                                              </figure>

                                          </a>
                                          <div class="bg-white pt-20 pl-20 pr-15">
                                              <div class="pr-md-10">
                                                  <div style="height: 52px">
                                                      
                                                      <h4 class="deal-title">
                                                          <div style="height: 52px; overflow: hidden;">
                                                              <a href="{{ route('chi-tiet-san-pham', $product->id) }}">
                                                              {{ $product->ten_san_pham }}
                                                          </a>
                                                          </div>

                                                      </h4>

                                                  </div>
                                                  <div class="deal-price pos-r mb-15">
                                                      <!-- <i class="fa fa-cart-plus ptb-5 cart-plus" aria-hidden="true"></i> -->
                                                      <h3 class="price ptb-5">
                                                          <!-- <span class="price-sale">
                                                              120000
                                                          </span> -->
                                                          {{ number_format($product->don_gia,0)}} VNĐ
                                                      </h3>

                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  @endforeach
                                    <div class="clear"></div>
                                </div>
                        </div>
                    </div>
                </div>


                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
<script>
    function increaseValue() {
        var value = parseInt(document.getElementById('qty').value, 10);
        value = isNaN(value) ? 1 : value;
        value++;
        document.getElementById('qty').value = value;
    }

    function decreaseValue() {
        var value = parseInt(document.getElementById('qty').value, 10);
        value = isNaN(value) ? 1 : value;
        value < 1 ? value = 1 : '';
        value--;

        document.getElementById('qty').value = value;
    }
    $(function() {
        $('.result-rating').starRating({
            readOnly: true,
            totalStars: 5,
            starSize: 22,
            emptyColor: '#e9ebee',
            activeColor: '#FF912C',
            strokeColor: '#FF912C',
             strokeWidth: 20,
            useGradient: false
        });
    });



</script>
@endsection
