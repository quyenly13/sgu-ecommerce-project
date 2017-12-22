@extends('customer.layouts.main')

@section('title', 'Kết quả tìm kiếm')

@section('content')
<main id="mainContent" class="main-content">
    <div class="page-container ptb-10">
        <div class="container">
            <div class="section deals-header-area">
                <div class="row row-tb-20">
                    <!-- cate -->
                    @include('customer.components.menu_categories')
                <div class="col-xs-12 col-md-8 col-lg-9">
                    <section class="section latest-deals-area">
                        <header class="panel ptb-15 prl-20 pos-r mb-30">
                            <h3 class="section-title font-18">Kết quả tìm kiếm cho: 
                            @if(isset($nameMer))
                            <i class="price">{{ $nameMer }}</i>
                            @endif
                            </h3>
                            @if(isset($start))
                            <p style="font-size: 16px">Giá sản phẩm: từ <i class="price"> {{ number_format($start,0)}} VNĐ</i> đến <i class="price">{{ number_format($end,0)}} VNĐ</i> </p>
                            @endif
                        </header>
                         @if(isset($msg))
                            <div class="col-sm-12">
                                <h4>{{ $msg}}</h4>
                            </div>
                          @else
                        <div class="row row-masnory row-tb-20" id="resultSearch">



                                @foreach($product as $item)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="deal-single panel">
                                        <a href="{{ route('chi-tiet-san-pham', $item->id) }}">
                                            <figure class="deal-thumbnail embed-responsive embed-responsive-16by9" data-bg-img="{{ asset('assets/customer/images/logo.png') }}">
                                                <img src="{{$item->anh_dai_dien}}" alt="">
                                            </figure>

                                        </a>
                                        <div class="bg-white pt-20 pl-20 pr-15">
                                            <div class="pr-md-10">
                                                <div class="mb-10">
                                                    <h3 class="deal-title mb-10">
                                                        <div style="height: 52px; overflow: hidden;">
                                                            <a href="{{ route('chi-tiet-san-pham', $item->id) }}">
                                                                {{ $item->ten_san_pham }}
                                                            </a>
                                                        </div>
                                                    </h3>
                                                    <p class="text-muted mb-20">

                                                    </p>
                                                </div>
                                                <div class="deal-price pos-r mb-15">
                                                    <!-- <i class="fa fa-cart-plus ptb-5 cart-plus" aria-hidden="true"></i> -->
                                                    <h3 class="price ptb-5">
                                                        <!-- <span class="price-sale">
                                                            120000
                                                        </span> -->
                                                        {{ number_format($item->don_gia,0)}} VNĐ
                                                    </h3>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                        </div>
                        <div class="row">
                            @if(count($product) >= 9 )
                            <div class="page-pagination text-center mt-10 p-5 panel">
                            <nav style="color: #25c76f">
                                <!-- Page Pagination -->

                                    {!! $product->setPath('')->appends(Request::except('page'))->render() !!}

                                <!-- End Page Pagination -->
                            </nav>
                                            @endif
                        </div>
                        </div>
                        @endif
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
