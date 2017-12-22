@extends('webmaster.master-layout.master-layout')

@section('title_page')
Thống kê doanh thu @endsection
 @section('content')
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="white-box">

            <form class="form-horizontal " method="POST" action="{{ route('getdoanhthugoitin') }}">
                {{ csrf_field() }}
                          <h3>Chọn ngày thống kê</h3>
                <div class="form-group{{ $errors->has('tu_ngay') ? ' has-error' : '' }} ">
                    <label for="tu_ngay" class="col-md-1">Từ ngày</label>
                    <div class='input-group date  col-md-4' id='datepick_tu_ngay'>
                        <input type="text" id="tu_ngay" placeholder="Chọn ngày" name="tu_ngay" class="form-control" required>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar">
                            </span>
                        </span>
                    </div>
                    @if ($errors->has('tu_ngay'))
                    <span class="help-block">
                        <strong>{{ $errors->first('tu_ngay') }}</strong>
                    </span>
                    @endif

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
                    @if ($errors->has('den_ngay'))
                    <span class="help-block">
                        <strong>{{ $errors->first('den_ngay') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success getdata">Lấy dữ liệu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <?php $tongthu =0;  ?>


    <div class="panel panel-success" id="content_chi">
        <div class="panel-heading">Bảng thống kê mua gói tin</div>
        <div class="panel-body">
            <table id="bangdoanhthu" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Ngày giao dịch</th>
                        <th>Tổng doanh thu trong ngày (VNĐ)</th>
                    </tr>
                </thead>

                <tbody>
                  @isset($lst_phieuthu)
                    @foreach ($lst_phieuthu as $item)
                  <tr>
                      <td>{{$item->date}}</td>
                      <td>{{number_format($item->sum,0)}}</td>


                  </tr>
                  <?php $tongthu += $item->sum ?>
                  @endforeach
                  @endisset

                </tbody>
            </table>
        </div>
    </div>
    <h2 class="text-danger">Tổng lợi nhuận: {{number_format($tongthu,0,'',',')}} VNĐ</h2>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    $(function () {

        $("#datepick_tu_ngay").datetimepicker({
            format: 'DD/MM/YYYY'
        });
        $("#datepick_den_ngay").datetimepicker({
            format: 'DD/MM/YYYY'
        });

        $('#bangdoanhthu').DataTable({
            "language": {
          "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json",
        },
                   "bSort": false,
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
  $('#ql-tk-goi-tin').addClass('active');
});
</script>
@endsection
