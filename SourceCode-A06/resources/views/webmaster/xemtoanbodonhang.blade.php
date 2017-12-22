@extends('webmaster.master-layout.master-layout')
@section('title_page')
DANH SÁCH CÁC ĐƠN HÀNG CỦA NGƯỜI MUA
@endsection
 @section('content')
 <style>
 #table_dh.dataTable tbody tr{
     cursor:pointer;
 }
 </style>

<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="white-box">
          <div class="row">
                  <div class="col-sm-12">
                      <div class="white-box">
                          <h3 class="box-title">TOÀN BỘ CÁC ĐƠN HÀNG CỦA NGƯỜI MUA</h3>
                          <h6><i>*Click vào dòng trong bảng để xem chi tiết đơn hàng</i> </h6>
                          <div class="table-responsive">
                          <table id="table_dh" class="display table-hover" cellspacing="0" width="100%">
                                  <thead>
                                      <tr>
                                        <th>Tên đăng nhập</th>
                                        <th>Họ Tên</th>
                                        <th>Ngày Đặt Hàng</th>
                                      </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th>Tên đăng nhập</th>
                                      <th>Họ Tên</th>
                                      <th>Ngày Đặt Hàng</th>
                                    </tr>
                                  </tfoot>
                                  <tbody>
                                  @foreach($donhangs as $dh)
                                  <tr id="{{$dh->id}}" class="xemchitiet"  data-toggle="modal" data-target="#myModal">
                                      <td >{{ $dh->customer->ten_dang_nhap }}</td></a>
                                      <td>{{ $dh->customer->ho_ten }}</td>
                                      <td>{{ $dh->created_at}}</td>
                                  </tr>
                                  @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
        </div>
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

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    $(function () {
      $('#table_dh').DataTable({
                 "language": {
               "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json",
           },
              "order": [[2, "desc"]]
         });

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


       } );

</script>

<script type="text/javascript">
$(document).ready(function() {
  $('#side-menu').children('a').each(function() {
          if($(this).hasClass('active'))
    {
      $(this).removeClass('active');
    }
  })
  $('#ql-tk-dh').addClass('active');
});
</script>


@endsection
