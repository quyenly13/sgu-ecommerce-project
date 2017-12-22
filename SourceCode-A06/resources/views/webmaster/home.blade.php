@extends('webmaster.master-layout.master-layout')
@section('content')
<!-- row -->
<style>
#table_dh tbody tr{
    cursor:pointer;
}
</style>

<div class="row">
  <!--col -->
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="white-box">
          <div class="col-in row">
              <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                  <h5 class="text-muted vb">KHÁCH HÀNG MỚI TRONG TUẦN NÀY</h5> </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                  <h3 class="counter text-right m-t-15 text-danger">{{ $cus_count }}</h3> </div>

          </div>
      </div>
  </div>
  <!-- /.col -->
  <!--col -->
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="white-box">
          <div class="col-in row">
              <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
                  <h5 class="text-muted vb">NGƯỜI BÁN MỚI TRONG TUẦN NÀY</h5> </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                  <h3 class="counter text-right m-t-15 text-megna">{{ $mer_count }}</h3> </div>

          </div>
      </div>
  </div>
  <!-- /.col -->
  <!--col -->
  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="white-box">
      <div class="col-in row">
              <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe00b;"></i>
                  <h5 class="text-muted vb">HÓA ĐƠN MUA TIN TRONG TUẦN NÀY</h5> </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                  <h3 class="counter text-right m-t-15 text-primary">{{ $hoadon_count }}</h3> </div>

          </div>
      </div>
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
<!--row -->
<div class="row">
  <div class="col-sm-12">
      <div class="white-box">
          <h3 class="box-title">Các đơn hàng gần đây
          </h3>
          <div class="table-responsive">
              <table class="table table-hover" id="table_dh">
                  <thead>
                      <tr>
                          <th>TÊN ĐĂNG NHẬP</th>
                          <th>HỌ TÊN</th>
                          <th>NGÀY ĐẶT MUA</th>
                          <th>TỔNG TIỀN (VNĐ)</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($lst_donhangganday as $dh)
                      <tr id="{{$dh->id}}"  class="xemchitiet"  data-toggle="modal" data-target="#myModal">
                          <td class="txt-oflo">{{ $dh->customer->ten_dang_nhap }}</td>
                          <td>{{ $dh->customer->ho_ten }}</td>
                          <td class="txt-oflo">{{ $dh->updated_at }}</td>
                          <td>{{ number_format($dh->tong_tien,0) }}</td>
                      </tr>
                    @endforeach

                  </tbody>
              </table> <a href="{{ route('getalldonhang')}}">Xem toàn bộ các đơn hàng của người mua </a> </div>
      </div>
  </div>
  <div id="myModal" class="modal fade" role="dialog">
             <div class="modal-dialog">
               <div class="modal-content" id="cthd-container">
                 @isset($detail_invoice)
                 @include('webmaster.modalctdh-partial');
                 @endisset
               </div>
             </div>
           </div>


</div>
<!-- /.row -->
<!-- row -->
<div class="row">
  <div class="col-md-12 col-lg-6 col-sm-12">
      <div class="white-box">
          <h3 class="box-title">ĐÁNH GIÁ GẦN ĐÂY</h3>
                <div class="comment-center">

                  @foreach($danhgiaganday as $dg)
                  <div class="comment-body">
                      <div class="mail-contnet">
                          <h5>{{$dg->merchant->ten_dang_nhap }} </h5>
                           <span class="stars" data-rating="{{ $dg->diem_so }}" data-num-stars="5" > </span></br>
                           Đánh giá của người mua <strong> {{$dg->customer['ten_dang_nhap']}} </strong> vào lúc {{ $dg->created_at }}
                        </div>
                  </div>
                  @endforeach
                  <div class="comment-body">
                    <a href="{{ route('getdanhgia')}}">Xem thống kê đánh giá </a>
                  </div>
          </div>
      </div>
  </div>
  <div class="col-lg-6 col-md-12 col-sm-12">
      <div class="white-box">
          <h3 class="box-title">TOP SẢN PHẨM BÁN CHẠY</h3>
          <div class="message-center">
            @foreach($top_banchay as $bc)
                  <div class="user-img">
                    <img src="{!! asset('uploads/'. $bc->sanpham->anh_dai_dien ) !!}" alt="{{ $bc->sanpham->id }}" > <span class="profile-status online pull-right"></span> </div>
                  <div class="mail-contnet">
                  <span class="mail-desc"><h5>{{ $bc->sanpham->ten_san_pham }}</h5> </span></br>
                  <strong> {{$bc->merchant}} </strong>
                </div>
              @endforeach
          </div>
      </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $('#side-menu').children('a').each(function() {
          if($(this).hasClass('active'))
    {
      $(this).removeClass('active');
    }
  })
  $('#trang-chinh').addClass('active');
});
</script>

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

    $.fn.stars = function() {
        return $(this).each(function() {

            var rating = $(this).data("rating");

            var numStars = $(this).data("num-stars");

            var fullStar = new Array(Math.floor(rating + 1)).join('<i class="fa fa-star"></i>');

            var halfStar = ((rating%1) !== 0) ? '<i class="fa fa-star-half-empty"></i>': '';

            var noStar = new Array(Math.floor(numStars + 1 - rating)).join('<i class="fa fa-star-o"></i>');

            $(this).html(fullStar + halfStar + noStar);

        });
    }

    $('.stars').stars();


             $(".xemchitiet").click(function(event) {
               event.preventDefault();
               var id =  $(this).attr('id');
               //console.log(id);
              $.ajax({
                url: '/webmaster/xemchitietdhwebmaster',
                type: 'GET',
                dataType : 'html',
                data: {id_hd: id },
                success:function(data) {
                  $("#cthd-container").html(data);
                  //console.log('du');
                }
            })
          });
</script>

@endsection
