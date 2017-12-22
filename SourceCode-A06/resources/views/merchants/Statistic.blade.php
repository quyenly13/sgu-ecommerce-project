@extends('merchants.master-layout.master-layout')
@section('title', 'Thống kê doanh thu')
 @section('title_page') Thống kê doanh thu @endsection @section('content')
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="white-box">

                <div class="form-group{{ $errors->has('tu_ngay') ? ' has-error' : '' }} ">
                    <label for="tu_ngay" class="col-md-1">Từ ngày</label>
                    <div class='input-group date  col-md-4' id='datepick_tu_ngay'>
                        <input type="text" id="tu_ngay" placeholder="Chọn ngày" name="tu_ngay" class="form-control" required>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar">
                            </span>
                        </span>
                    </div>

                    <span class="help-block tu_ngay hide">
                        <strong>Chọn ngày</strong>
                    </span>
                </div>
                <div class="form-group{{ $errors->has('den_ngay') ? ' has-error' : '' }} ">
                    <label for="den_ngay" class="col-md-1">Đến ngày</label>
                    <div class='input-group date  col-md-4' id='datepick_den_ngay'>
                        <input type="text" id="den_ngay" placeholder="Chọn ngày" name="den_ngay" class="form-control" required>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar">
                            </span>
                        </span>
                    </div>

                    <span class="help-block den_ngay hide">
                        <strong>Chọn ngày</strong>
                    </span>

                </div>

                        <button class="btn btn-success getdata">Lấy dữ liệu</button>


        </div>
    </div>
</div>
<div id="LoadSta">
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
$(document).ready(function(){
    $(document).on("click",".getdata",function(){
        if($("#tu_ngay").val()=='')
        {
            $(".tu_ngay").removeClass('hide');
        }
        else if($("#den_ngay").val()=='')
        {
            $(".den_ngay").removeClass('hide');
        }
        else{
           var start = $("#tu_ngay").val().split("-");
           var start_y = start[2]+'-'+start[1]+'-'+start[0];

           var end = $("#den_ngay").val().split("-");
           var end_y=end[2]+'-'+end[1]+'-'+end[0];
           console.log(end_y);
        $('#LoadSta').stop(true, true).load('/merchant/statistic/'+start_y+"/"+end_y);
        }

    });
});
    $(function () {

        $("#datepick_tu_ngay").datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $("#datepick_den_ngay").datetimepicker({
            format: 'DD-MM-YYYY'
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
  $('#tk-doanh-thu').addClass('active');
});
</script>
 @endsection
