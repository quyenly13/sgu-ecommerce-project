@extends('merchants.master-layout.master-layout')
@section('title', 'Danh sách hóa đơn')
@section('title_page')

 <span class="box-title">Danh sách đơn đặt hàng
              <div class="col-md-2 col-sm-4 col-xs-12 pull-right">
                  <select id="stt" class="form-control pull-right row b-none">
                      <option value="0">Đang chờ xử lý</option>
                      <option value="1">Đang giao</option>
                      <option value="2">Hoàn tất</option>
                      <option value="3">Đã hủy</option>

                  </select>
              </div>
          </h3>
@endsection
@section('content')
<div id="alertbox" class="hide">
            @if (session('success'))
            <p class="alert alert-success">{!! session('success') !!}</p>
            @endif
            @if(count($errors)>0)
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach
            @endif
        </div>
    <div id="loadtable"></div>
    <div class="modal fade" id="detail_invoice" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="title"></h4>
          <span class="hide" id="setIdhd"></span>
        </div>
        <div class="modal-body" id="detail">

        </div>
        <div class="modal-footer">

   <div class="form-group ghi_chu_BH">

                            <label for="ghi_chu_m" class="col-xs-3 control-label">Ghi chú(Nếu có)</label>

                            <div class="col-xs-5">
                                <input id="ghi_chu_m" type="text" class="form-control" name="ghi_chu_m" autofocus>


                            </div>
                        </div>
                        <br>
            <div class="dropdown pull-left">
                <a href="#" class="btn btn-warning btn-xs dropdown-toggle" id="update_stt" data-toggle="dropdown">Cập nhật tình trạng</a>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="href_danggiao"  data-dismiss="modal" data-stt="1">Đang giao</a></li>
                        <li><a href="#" class="href_hoantat" data-dismiss="modal" data-stt="2">Hoàn tất</a></a></li>
                        <li><a href="#" class="href_huydon" data-dismiss="modal" data-stt="3">Hủy đơn</a></li>
                    </ul>
            </div>

          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>

    </div>
  </div>
  <script>
  $(document).ready(function(){
      LoadAjax(0);
    function LoadAjax(id) {
        $('#loadtable').stop(true, true).load('/merchant/loadinvoice_list/'+id,function(){
             $('#myTable').DataTable({
            "order": [[ 1, 'asc' ]],
             "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
            }
        });
        });
    }
    $(document).on("click","tr.invoice_line",function(){

        $("#title").text("Chi tiết đơn hàng của "+$(this).data("name"));
        var id_hd = $(this).data("id");

        $("#setIdhd").text(id_hd);


        if($(this).data('stt') == "Hoàn tất")
        {
            $(".modal-footer .dropdown").empty();
            $("#update_stt").addClass('hide');
            $(".ghi_chu_BH").addClass('hide');
        }
        else{
            $("#update_stt").removeClass('hide');
             $(".ghi_chu_BH").removeClass('hide');
            $(".modal-footer .dropdown").html('  <a href="#" class="btn btn-warning btn-xs dropdown-toggle" id="update_stt" data-toggle="dropdown">Cập nhật tình trạng</a> <ul class="dropdown-menu">\
                        <li><a href="#"class="href_danggiao"  data-stt="1">Đang giao</a></li>\
                        <li><a href="#" class="href_hoantat"  data-stt="2">Hoàn tất</a></a></li>\
                        <li><a href="#"class="href_huydon"   data-stt="3">Hủy đơn</a></li>\
                    </ul>')
        }
        var ghi_chu_m = '-';
        $(document).on("keyup","#ghi_chu_m",function(){
            var ghi_chu_m =$(this).val();
             $(".href_danggiao").attr('href','/merchant/update_invoice/'+id_hd+'/1/'+ghi_chu_m);
            $(".href_hoantat").attr('href','/merchant/update_invoice/'+id_hd+'/2/');
            $(".href_huydon").attr('href','/merchant/update_invoice/'+id_hd+'/3/'+ghi_chu_m);
        })

        $.ajax({
            url:"/merchant/detail_invoice",
            method:"get",
            data:{ id_hd : id_hd },
            success:function(data){
                $("#detail").html(data);
                 $('#myTable_detail').DataTable({
                    "pageLength": 1,
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
                    }
                });


            }
        });
        $(".href_danggiao").attr('href','/merchant/update_invoice/'+id_hd+'/1/'+ghi_chu_m);
        $(".href_hoantat").attr('href','/merchant/update_invoice/'+id_hd+'/2/'+ghi_chu_m);
        $(".href_huydon").attr('href','/merchant/update_invoice/'+id_hd+'/3/'+ghi_chu_m);

    });

    $(document).on("change","#stt",function(event){

        var stt = $(this).val();
        LoadAjax(stt);
       // alert(stt);
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
    $('#ql-hd-bh').addClass('active');
  });
  </script>
@endsection
