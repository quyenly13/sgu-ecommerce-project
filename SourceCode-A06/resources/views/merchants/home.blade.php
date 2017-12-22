@extends('merchants.master-layout.master-layout')
@section('title', 'Trang chủ')
@section('title_page')
Trang chủ
@endsection
@section('content')
<!-- row -->
<div class="row">
  @if(count($sanpham_saphet)>0)
    <div class="alert alert-danger">
      <div class="sphethang" style="cursor:pointer"><strong>Hiện bạn đang có {{ count($sanpham_saphet)}} sản phẩm sắp hết hàng !</strong>
      <div class="pull-right">Ấn để xem chi tiết / thu gọn </div>
      </div>
      <div class="hethanglist" style="display:none;cursor:pointer;">
      @foreach($sanpham_saphet as $sp)
        <li> {{ $sp->ten_san_pham }} còn <strong>{{ $sp->so_luong_ton_kho}}</strong> sản phẩm </li>
      @endforeach
    </div>
  </div>
  @endif
</div>

<div class="row">
  <!--col -->
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="white-box">
          <div class="col-in row">
              <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                  <h5 class="text-muted vb">SỐ LƯỢNG TIN ĐÃ ĐĂNG</h5> </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                  <h3 class="counter text-right m-t-15 text-danger">{{$soluong_baidang}}</h3> </div>

          </div>
      </div>
  </div>
  <!-- /.col -->
  <!--col -->
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="white-box">
          <div class="col-in row">
              <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
                  <h5 class="text-muted vb">SỐ LƯỢNG TIN CÒN LẠI</h5> </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                  <h3 class="counter text-right m-t-15 text-megna">{{$soluong_tinduocdang->so_luong_tin}}</h3> </div>

          </div>
      </div>
  </div>
  <!-- /.col -->
  <!--col -->
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="white-box">
          <div class="col-in row">
              <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe00b;"></i>
                  <h5 class="text-muted vb">SỐ SẢN PHẨM CHƯA GIAO</h5> </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                  <h3 class="counter text-right m-t-15 text-primary">{{$soluong_donhang}}</h3> </div>

          </div>
      </div>
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
<!--row -->
<div class="row">
  <div class="col-md-12">
      <div class="white-box">
          <h3 class="box-title">Biểu đồ đánh giá</h3>
           <h2 class="">Điểm đánh giá trung bình: {{$diemtb}}</h2>
          <div id="chart"></div>

      </div>
  </div>
</div>
<script>
$(document).ready(function(){
 var donut_chart = Morris.Donut({
     element: 'chart',
      colors: [
            '#0BA462',
            '#39B580',
            '#67C69D',
            '#95D7BB',
            '#980000',
        ],
     data: <?php echo $array_name; ?>
    });
});
</script>

                <script type="text/javascript">
                $(document).ready(function() {
                  $('#side-menu').children('a').each(function() {
                          if($(this).hasClass('active'))
                    {
                      $(this).removeClass('active');
                    }
                  })
                  $('#trang-chu').addClass('active');
                });

                $('.sphethang').click(function(event) {
                  $('.hethanglist').slideToggle();
                });
                $('.hethanglist').click(function(event) {
                  $('.hethanglist').slideToggle();
                });
                </script>
@endsection
