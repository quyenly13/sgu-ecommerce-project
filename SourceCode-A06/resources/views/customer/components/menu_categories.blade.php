
</script>
<div class="col-xs-12 col-md-4 col-lg-3">
    <aside>
        <ul class="nav-coupon-category panel">
            @foreach ($categories as $category)
                <li>
                    <a href="{{ route('product-cate', $category->id) }}">
                        <i class="fa fa-product-hunt"></i>{{ $category->ten_danh_muc }}
                        <span>{{ $category->sanpham->count() }}</span>
                    </a>
                </li>
            @endforeach
            <li class="all-cat">
                <a class="font-14" href="{{ url('/home/categories') }}">Nhiều hơn</a>
            </li>
        </ul>
    </aside>
    <div class="mb-30"></div>
    <aside id="search-bar">
        <p class="title">Người bán</p>
         <!-- <ul class="nav-coupon-category panel" style="overflow: auto; max-height: 200px;"> -->
          <form action="{{ route('searchPrice') }}" method="get" id="products">
                <div class="input-group" style="margin-left: 8px">
                    <input type="text" name="merchant" class="form-control input-lg search-input" style="width: 245px" placeholder="Nhập tên người bán...">
                </div>

        <!-- </ul> -->

        <div classs="mb-10"></div>
        <p class="title"><label for="amount">Giá</label></p>



            <div class="price-range"><!--price-range-->
               <p>
                    <label for="amount"></label>
                    <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                    <input type="text" id="start" class="hidden"  name="start">
                    <input type="text" id="end" name="end" class="hidden">
                </p>

                <div id="slider-range"></div>
            </div>
             <button class="btn cart" id="btn-search" type="submit">Lọc</button>
        </form>

    </aside>
</div>
<script type="text/javascript">

    $('#slider-range' ).slider({
      range: true,
      min: 0,
      max: 5000000,
      step: 1000,
      values: [ 80000, 200000 ],
      slide: function( event, ui ) {
        $( "#amount" ).val(ui.values[ 0 ].toLocaleString() + " - " + ui.values[ 1 ].toLocaleString() + " VNĐ" );
        var start = ui.values[0];
        var end = ui.values[1];
        $( '#start' ).val(start);
        $( '#end' ).val(end);


      }
    });
    $( '#amount' ).val($( "#slider-range" ).slider( "values", 0 ) +
      " - " + $( "#slider-range" ).slider( "values", 1 ) + " VNĐ" );
   $( '#start' ).val($( "#slider-range" ).slider( "values", 0 ) );
   $( '#end' ).val($( "#slider-range" ).slider( "values", 1 ) );
</script>
