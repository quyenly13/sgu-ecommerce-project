<section class="section latest-deals-area">
    <header class="panel ptb-15 prl-20 pos-r mb-30">
        <h3 class="section-title font-18">Sản phẩm mới nhất</h3>
    </header>

    <div class="row row-masnory row-tb-20">
        @foreach($latestProducts as $product)
        <div class="col-sm-6 col-lg-4">
            <div class="deal-single panel">
                <a href="{{ route('chi-tiet-san-pham', $product->id) }}">
                    <figure class="deal-thumbnail embed-responsive embed-responsive-16by9">
                        <img src="/{{$product->anh_dai_dien}}" alt="" id="jqzoom" style="width: 100%;" />
                    </figure>

                </a>
                <div class="bg-white pt-20 pl-20 pr-15">
                    <div class="pr-md-10">
                        <div style="height: 52px">
                            <!-- <div class="rating mb-10">
                                <span class="rating-stars" data-rating="2">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </span>
                            </div> -->
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

    </div>
    <div class="row">
        <div class="page-pagination text-center mt-10 p-5 panel">
        <nav style="color: #25c76f">
            <!-- Page Pagination -->
            {{ $latestProducts ->links() }}
            <!-- End Page Pagination -->
        </nav>
    </div>
    </div>
    
</section>
