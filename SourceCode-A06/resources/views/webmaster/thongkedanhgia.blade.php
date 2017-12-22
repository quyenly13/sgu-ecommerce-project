@extends('webmaster.master-layout.master-layout')
@section('title_page')
Thống kê đánh giá@endsection
 @section('content')
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="white-box">
          <div class="row">
                  <div class="col-sm-12">
                      <div class="white-box">
                          <h3 class="box-title">THỐNG KÊ ĐÁNH GIÁ NGƯỜI MUA</h3>
                          <div class="table-responsive">
                          <table id="table_dg" class="display table-hover" cellspacing="0" width="100%">
                                  <thead>
                                      <tr>
                                        <th>Tên đăng nhập</th>
                                        <th>Điểm trung bình</th>
                                        <th>Lượt đánh giá</th>
                                        <th>Xem DS Sản phẩm</th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th>Tên đăng nhập</th>

                                      <th>Điểm trung bình</th>
                                      <th>Lượt đánh giá</th>
                                      <th>Xem DS Sản phẩm</th>
                                    </tr>
                                  </tfoot>
                                  <tbody>
                                  @foreach($danhgias as $dg)
                                  <tr>
                                    <td>  <a href="{{ route('thong_tin_merchant_admin',['id'=>$dg->id_m]) }}">{{ $dg->ten_dang_nhap }}</a></td>
                                      @if($dg->avg>4.5)
                                       <td><span class="stars" data-rating="{{number_format($dg->avg,1) }}" data-num-stars="5" > </span>&nbsp;&nbsp;&nbsp;<span style="color:#33a30e">{{ $dg->avg }}</span></td>
                                      @elseif($dg->avg < 2.5 && $dg->avg > 0)
                                      <td><span class="stars" data-rating="{{ number_format($dg->avg,1) }}" data-num-stars="5" > </span>&nbsp;&nbsp;&nbsp;<span style="color:#a30e0e">{{ $dg->avg }}</span></td>
                                      @elseif($dg->avg==null)
                                      <td>Chưa có đánh giá </td>
                                      @else
                                      <td><span class="stars" data-rating="{{ number_format($dg->avg,1) }}" data-num-stars="5" > </span> &nbsp;&nbsp;&nbsp; </span>{{ $dg->avg }}</td>
                                      @endif
                                      <td>{{ $dg->count }}</td>
                                      <td> <a href="{{ route('product-mer',['id'=>$dg->id_m]) }}">Xem DS sản phẩm</td>
                                  </tr>
                                  @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    $(function () {

        $('#table_dg').DataTable({
            "language": {
          "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json",
        },
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
  $('#ql-tk-danh-gia').addClass('active');
});
</script>
<script>

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


</script>
@endsection
