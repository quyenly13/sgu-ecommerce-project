@extends('customer.layouts.main')

@section('title', 'Đánh giá người bán')

@section('content')
<div class="row">
  <section class="col-md-8 col-md-offset-2 rating-widget" id="rating-merchant">

  <p class="mt-20 mb-30"> Mời bạn đánh giá cho người bán <strong>  {{ $merchant->ho_ten }} </strong> với đơn hàng của bạn:</p> 

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Tên Sản Phẩm </th>
        <th>Số lượng</th>
        <th>Đơn giá (VNĐ)</th>
        <th>Tổng cộng (VNĐ)</th>
      </tr>
    </thead>
    <tbody>
      <?php $tong = 0; ?>
      @foreach($lst_cthd as $ct)
      <tr>
        <td>{{ $ct->sanpham->ten_san_pham }}</td>
        <td>{{ $ct->so_luong }}</td>
        <td>{{ number_format($ct->sanpham->don_gia,0)}}</td>
        <td>{{ number_format($ct->tong_tien,0)}}</td>
      </tr>
    <?php  $tong = $tong +  $ct->tong_tien ;?>
      @endforeach
    </tbody>
  </table>

  <strong>TỔNG TIỀN</strong> : {{ number_format($tong,0) }} VNĐ
  <!-- Rating Stars Box -->
  <div class="">
    <h3>Đánh giá:  </h3>
    <form action="{{ route('rating') }}" method="POST">
      {{ csrf_field() }}
      <div class="rating-stars">
      <ul id="stars">
        <li class="star" title="Kém" data-value="1">
          <i class="fa fa-star fa-fw"></i>
        </li>
        <li class="star" title="Trung bình" data-value="2">
          <i class="fa fa-star fa-fw"></i>
        </li>
        <li class="star" title="Khá" data-value="3">
          <i class="fa fa-star fa-fw"></i>
        </li>
        <li class="star" title="Tốt" data-value="4">
          <i class="fa fa-star fa-fw"></i>
        </li>
        <li class="star" title="Rất tốt" data-value="5">
          <i class="fa fa-star fa-fw"></i>
        </li>
      </ul>
      <input type="hidden" value="0" id="rating_point" name="diem_so"/>
      <input type="hidden" value="{{ $id_hd }}" id="idhd" name="id_hd"/>
      <input type="hidden" value="{{ $merchant->id_m}}" id="idm" name="id_m"/>
      <input type="hidden" value="{{ $id_c }}" id="idc" name="id_c"/>
    </div>

    <div class="success-box">
      <div class="text-message"></div>
    </div>
    <div class="btn-rating">
      <button class="btn btn-default" type="submit">Xong</button>
    </div>
  </form>
  </div>

</section>

</div>

@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
  // hover mouse
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10);

    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });

  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });


//  click
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10);
    var stars = $(this).parent().children('li.star');

    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }

    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }


    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "Cảm ơn bạn. Bạn đã đánh giá " + ratingValue + " sao";
    $("#rating_point").val(ratingValue);
    responseMessage(msg);

  });

});


  function responseMessage(msg) {
    // $('.success-box').fadeIn(200);
    $('.success-box div.text-message').html("<span>" + msg + "</span>");
  }

</script>
@endsection
