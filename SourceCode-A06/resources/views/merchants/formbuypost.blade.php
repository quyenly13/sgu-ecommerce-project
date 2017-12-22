@extends('merchants.master-layout.master-layout')
@section('title', 'Mua gói tin')
@section('title_page')
Mua gói tin
@endsection
@section('content')
<!-- row -->
<div class="row">
 <div id="alertbox" class="hide">
            @if (Session::has('success'))
            <p class="alert alert-success">{!! session('success') !!}</p>
            @endif
            @if(count($errors)>0)
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach
            @endif
            </div>
  <!--col -->
  @foreach($list_goitin as $item)
  @if($item->don_gia >= 100000)
  <a href="" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 goitin" data-id="{{$item->id}}">
      <div class="white-box ">
          <div class="col-in row">
              <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                <span class="hide idgoitin_{{$item->id}}" >{{$item->id}}</span>
                  <h5 class="text-muted vb">Gói tin <span class="dongia_goitin_{{$item->id}}">{{ $item->don_gia }}</span</h5> </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                  <h4 class=" text-danger">Số lượng tin đăng: <span class="soluong_tin_{{$item->id}}">{{$item->so_luong}}</span></h4> </div>

          </div>
      </div>
  </a>
 @elseif($item->don_gia == 20000)
  <a href="" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 goitin"  data-id="{{$item->id}}">
      <div class="white-box ">
          <div class="col-in row">
              <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
              <span class="hide idgoitin_{{$item->id}}" >{{$item->id}}</span>
              <h5 class="text-muted vb">Gói tin <span class="dongia_goitin_{{$item->id}}">{{ $item->don_gia }}</span</h5> </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
              <h4 class=" text-blue">Số lượng tin đăng: <span class="soluong_tin_{{$item->id}}">{{$item->so_luong}}</span></h4> </div>

          </div>
      </div>
  </a>
  @elseif($item->don_gia == 50000)
  <a href="" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 goitin" data-id="{{$item->id}}">
      <div class="white-box ">
          <div class="col-in row">
              <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe00b;"></i>
              <span class="hide idgoitin_{{$item->id}}" >{{$item->id}}</span>
              <h5 class="text-muted vb">Gói tin <span class="dongia_goitin_{{$item->id}}">{{ $item->don_gia }}</span</h5> </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
              <h4 class=" text-primary">Số lượng tin đăng: <span class="soluong_tin_{{$item->id}}">{{$item->so_luong}}</span></h4> </div>

          </div>
      </div>
  </a>
  @else
  <a href="" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 goitin" data-id="{{$item->id}}">
      <div class="white-box ">
          <div class="col-in row">
              <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe00b;"></i>
              <span class="hide idgoitin_{{$item->id}}" >{{$item->id}}</span>
              <h5 class="text-muted vb">Gói tin <span class="dongia_goitin_{{$item->id}}">{{ $item->don_gia }}</span</h5> </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
              <h4 class=" text-warning">Số lượng tin đăng: <span class="soluong_tin_{{$item->id}}">{{$item->so_luong}}</span></h4> </div>

          </div>
      </div>
  </a>
  @endif
  @endforeach
  <!-- /.col -->

</div>
<div class="row">
        <div class="panel panel-success" id="form_dangki">
            <div class="panel-heading">Đăng kí gói tin</div>
        <div class="panel-body">
        <div class="col-md-8 col-md-offset-2">
        <div id="alertbox" class="hide">
            @if (Session::has('success'))
            <p class="alert alert-success">{!! session('success') !!}</p>
            @endif
            @if(count($errors)>0)
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach
            @endif
        </div>

            <div class="panel panel-default">

                <div class="panel-heading">Thông tin gói tin vừa chọn</div>
                <div class="panel-body">
                      <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{{ url('/merchant/paypal') }}" >
                        {{ csrf_field() }}

                            <div class="col-md-6 hide">
                                <input id="id_goitin" type="text" class="form-control " name="id_goitin" value="{{ old('id_goitin') }}" required autofocus>
                            </div>
                            <div class="hide form-group{{ $errors->has('don_gia') ? ' has-error' : '' }}">
                            <label for="don_gia" class="col-md-4 control-label">Đơn giá</label>

                            <div class="col-md-6 hide">
                                <input id="don_gia"  type="text" class="form-control" value="{{ old('don_gia') }}" name="don_gia" required>

                                @if ($errors->has('don_gia'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('don_gia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="hide form-group{{ $errors->has('tong_tien') ? ' has-error' : '' }}">
                            <label for="tong_tien" class="col-md-4 control-label">Tổng tiền</label>

                            <div class="col-md-6">
                                <input id="tong_tien"  type="text" class="form-control" name="tong_tien" value="" required autofocus>

                                @if ($errors->has('tong_tien'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tong_tien') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                          <div class="hide form-group{{ $errors->has('thanh_tien') ? ' has-error' : '' }}">

                            <div class="col-md-6">
                                <input id="thanh_tien"  type="text" class="form-control" name="thanh_tien" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ten_goi_tin') ? ' has-error' : '' }}">
                            <label for="ten_goi_tin" class="col-md-4 control-label">Tên gói tin</label>

                            <div class="col-md-6">
                                <input id="ten_goi_tin" type="text" class="form-control" name="ten_goi_tin" required autofocus readonly="reaonly">
                            </div>
                        </div>
                      
                        <div class="form-group{{ $errors->has('so_luong') ? ' has-error' : '' }}">
                            <label for="so_luong" class="col-md-4 control-label">Số lượng</label>

                            <div class="col-md-6">
                                <input id="so_luong" type="number"  onkeypress="return (event.charCode > 47 && event.charCode < 58)"  regex="^[0][9]{1,10}$"  class="form-control" name="so_luong" value="1" required>

                                @if ($errors->has('so_luong'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('so_luong') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('don_gia_client') ? ' has-error' : '' }}">
                            <label for="don_gia_client" class="col-md-4 control-label">Đơn giá (VNĐ)</label>

                            <div class="col-md-6">
                                <input id="don_gia_client" disabled type="text" class="form-control" value="{{ old('don_gia_client') }}" name="don_gia_client" required>


                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('so_luong_tin_dang') ? ' has-error' : '' }}">
                            <label for="so_luong_tin_dang" class="col-md-4 control-label">Số lượng tin được đăng</label>

                            <div class="col-md-6">
                                <input id="so_luong_tin_dang" type="number" class="form-control" name="so_luong_tin_dang" value="" readonly="readonly" required>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tong_tien_client') ? ' has-error' : '' }}">
                            <label for="tong_tien_client" class="col-md-4 control-label">Tổng tiền (VNĐ)</label>

                            <div class="col-md-6">
                                <input id="tong_tien_client" disabled type="text" class="form-control" name="tong_tien_client" value="" required autofocus>
                            </div>
                        </div>


                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-paypal fa-fw" aria-hidden="true"></i>Thanh toán với Paypal
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
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
  $('#mua-gt').addClass('active');
});
</script>

<script>
    $(document).ready(function(){
        $("#form_dangki").hide();
        var sotintheogoi=0;
        function formatCurrency(ele) {

                    //So khớp số 1 số trong chuỗi khi 1 số sau nó(?=) lấy đc 3 số
                    var n = parseInt(ele).toFixed(1).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
                    var cur =n.split(".");
                    return cur[0];
                }
        $('.goitin').on("click",function(event){
            event.preventDefault();

            var id=$(this).data('id');
                var id_goitin = $(".idgoitin_"+id).text();
               var soluong_goitin = $('.soluong_tin_'+id).text();
               var dongia_goitin =$('.dongia_goitin_'+id).text();
               sotintheogoi =soluong_goitin;
               console.log(id_goitin,soluong_goitin,dongia_goitin);

            $("#form_dangki").slideDown('slow',function(){
            var so_luong = $("#so_luong").val();
              $("#id_goitin").val(id_goitin);
              $("#ten_goi_tin").val("Gói tin "+dongia_goitin);
              $("#so_luong_tin_dang").val(soluong_goitin);
           

              $("#don_gia").val(dongia_goitin);
              $("#don_gia_client").val(formatCurrency(dongia_goitin));
              $("#tong_tien").val(dongia_goitin*so_luong*0.000044);
              $("#thanh_tien").val(dongia_goitin*so_luong);
             console.log($("#thanh_tien").val());
              $("#tong_tien_client").val(formatCurrency(dongia_goitin*so_luong));

            });
            $("html, body").animate({ scrollTop: $(document).height() }, "slow");
        });
        $(document).on('keyup','#so_luong', function () {
            if(parseInt($(this).val()) <= 0)
            {
                $(this).val('1');
            }
            $(this).val($(this).val().replace(/([a-zA-z])+/g, '1'));
            var soluong = $(this).val();
            $("#tong_tien").val($("#don_gia").val()*soluong*0.000044);
            $("#thanh_tien").val($("#don_gia").val()*soluong);

            $("#tong_tien_client").val(formatCurrency($("#don_gia").val()*soluong));
            $("#so_luong_tin_dang").val(sotintheogoi*soluong);
    

        });
        $(document).on('click','#so_luong', function () {
            if(parseInt($(this).val()) <=0)
            {
                $(this).val('1');
            }
            var soluong = $(this).val();
            $("#tong_tien").val($("#don_gia").val()*soluong*0.000044);
            $("#thanh_tien").val($("#don_gia").val()*soluong);

            $("#tong_tien_client").val(formatCurrency($("#don_gia").val()*soluong));
            $("#so_luong_tin_dang").val(sotintheogoi*soluong);

            });
    });
</script>


@endsection
