@extends('webmaster.master-layout.master-layout')
@section('content')
<style>
#myTable tbody tr{
    cursor:pointer;
}
</style>





<div class="row">


                <div class="col-md-12 col-xs-12">

                  <div class="container white-box">
                    <h1 class="title-page">Thông tin chi tiết người mua</h1>
                    <h3 class="title-page">{{ $cus->ten_dang_nhap }}</h3>
                    <div class="group-tabs">
                      <!-- Nav tabs -->
                      <ul class="nav nav-pills" role="tablist">
                   <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông tin cá nhân</a></li>
                   <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Các đơn hàng</a></li>
                    <li role="presentation"><a href="#dg" aria-controls="dg" role="tab" data-toggle="tab">Lịch sử đánh giá</a></li>
                 </ul>

                 </ul>

                      <!-- Tab panes -->
                      <div class="tab-content col-md-11">
                        <div role="tabpanel" class="tab-pane active" id="home">

                          <form class="form-horizontal form-material">
             <div class="form-group">
                 <label class="col-md-12">Tên Đăng Nhập</label>
                 <div class="col-md-12">
                     <input type="text" value="{{ $cus->ten_dang_nhap }}" class="form-control form-control-line" disabled> </div>
             </div>
               <div class="form-group">
                   <label class="col-md-12">Full Name</label>
                   <div class="col-md-12">
                       <input type="text" value="{{ $cus->ho_ten}}" class="form-control form-control-line"  disabled> </div>
               </div>
               <div class="form-group">
                   <label for="example-email" class="col-md-12">Email</label>
                   <div class="col-md-12">
                       <input type="email" value="{{ $cus->email }}" class="form-control form-control-line" name="example-email" id="example-email"  disabled> </div>
               </div>
               <div class="form-group">
                   <label class="col-md-12">Số Điện Thoại</label>
                   <div class="col-md-12">
                       <input type="text" value="{{ $cus->sdt }}" class="form-control form-control-line" disabled > </div>
               </div>
               <div class="form-group">
                   <label class="col-md-12">Địa chỉ</label>
                   <div class="col-md-12">
                       <input type="text" value="{{ $cus->dia_chi }}" class="form-control form-control-line" disabled> </div>
               </div>
               <div class="form-group">
                   <label class="col-md-12">Ngày tạo</label>
                   <div class="col-md-12">
                       <input type="text" value="{{ $cus->created_at }}" class="form-control form-control-line" disabled> </div>
               </div>

                          </form>


                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
                          <div class="table-responsive">
                              <table class="table table-hover" id="table_fuck">
                                  <thead>
                                      <tr>
                                          <th>NGÀY ĐẶT MUA</th>
                                          <th>TỔNG TIỀN (VNĐ)</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($lst_hd as $dh)
                                      <tr id="{{$dh->id}}"  class="xemchitiet"  data-toggle="modal" data-target="#myModal">
                                          <td class="txt-oflo">{{ $dh->updated_at }}</td>
                                          <td>{{ number_format($dh->tong_tien,0) }}</td>
                                      </tr>
                                    @endforeach

                                  </tbody>
                              </table>
                            </div>
                      </div>

                      <div role="tabpanel" class="tab-pane" id="dg">

                        <div class="table-responsive">
                        <table id="table_dg" class="table table-hover table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                      <th>Tên Người Bán</th>
                                      <th>Điểm đánh giá</th>
                                      <th>Ngày đánh giá</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                  <tr>
                                    <th>Tên Người Bán</th>
                                    <th>Điểm đánh giá</th>
                                    <th>Ngày đánh giá</th>
                                  </tr>
                                </tfoot>
                                <tbody>
                                @foreach($lst_dg as $dg)
                                <tr>
                                  <td>  <a href="{{ route('thong_tin_merchant_admin',['id'=>$dg->id_m]) }}">{{ $dg->merchant->ten_dang_nhap }}</a></td>
                                    <td><span class="stars" data-rating="{{ number_format($dg->diem_so) }}" data-num-stars="5" > </span> &nbsp;&nbsp;&nbsp; </span>{{ $dg->avg }}</td>
                                    <td>{{ $dg->created_at}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
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
                          </div>
                  </div>
                    </div>
                  </div>

            </div>
            <!-- /.row -->
            <script type="text/javascript">
            $(document).ready(function() {
              $('#side-menu').children('a').each(function() {
                      if($(this).hasClass('active'))
                {
                  $(this).removeClass('active');
                }
              })
              $('#ql-nguoi-mua').addClass('active');
            });

            $('#table_dg').DataTable({
                "language": {
              "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json",
            },
            "order": [ 0, 'desc' ],
          });


                $('#table_fuck').DataTable({
                    "language": {
                  "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json",
                },
                "order": [ 0, 'desc' ],
              });
            $(".xemchitiet").click(function(event) {
              event.preventDefault();
              var id =  $(this).attr('id');
              var id_m = $(this).attr('name');
              //console.log(id);
             $.ajax({
               url: '/webmaster/xemchitietdhwebmaster',
               type: 'GET',
               dataType : 'html',
               data: {id_hd: id , idm : id_m  },
               success:function(data) {
                 $("#cthd-container").html(data);
                 //console.log('du');
               }
           })
         });


            </script><script>

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
