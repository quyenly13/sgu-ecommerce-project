@extends('customer.layouts.main')

@section('title', 'Trang chủ')

@section('content')    
<main id="mainContent" class="main-content">
    <div class="page-container ptb-10">
        <div class="container">
            <div class="section deals-header-area">
                <div class="row row-tb-20">
                    @include('customer.components.menu_categories')
                <div class="col-xs-12 col-md-8 col-lg-9">
                   <section class="section latest-deals-area">
    <header class="panel ptb-15 prl-20 pos-r mb-30 ">
        <h3 class="section-title font-18"> Tên cửa hàng: <i>{{ $merName->ten_dang_nhap }}</i></h3>
        <div>
         <div class="ratings mb-10">
            <h5 style="color: #000">Đánh giá:
                
                <span class="result-rating" data-rating="{{ $avgScore }}"></span>
            </h5>
        </div>
        <i>{{$numRating}} người đánh giá</i>
        </div>
        <!-- <div class="t-right rating-block">
            <button  class="btn- btn-default">Đánh giá</button>
        </div> -->
    </header>

    <div class="row row-masnory row-tb-20">
         @foreach($product as $item)
        <div class="col-sm-6 col-lg-4">
            <div class="deal-single panel">
                <a href="{{ route('chi-tiet-san-pham', $item->id) }}">
                    <figure class="deal-thumbnail embed-responsive embed-responsive-16by9" data-bg-img="{{ asset('assets/customer/images/logo.png') }}">
                        <img src="/{{$item->anh_dai_dien}}" alt="">
                    </figure>
                    
                </a>
                <div class="bg-white pt-20 pl-20 pr-15">
                    <div class="pr-md-10">
                        <div class="mb-10">
                            <!-- <div class="rating mb-10">
                                <span class="rating-stars" data-rating="2">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </span>
                            </div> -->
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
    <div class="page-pagination text-center mt-10 p-5 panel">
        <nav style="color: #25c76f">
            <!-- Page Pagination -->
            {{ $product->links() }}
            <!-- End Page Pagination -->
        </nav>
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
    $(function() {
        $('.result-rating').starRating({
            readOnly: true,
            totalStars: 5,
            starSize: 22,
            emptyColor: '#fff',
            activeColor: '#FF912C',
            strokeColor: '#FF912C',
             strokeWidth: 25,
            useGradient: false
        });
    });
</script>
@endsection