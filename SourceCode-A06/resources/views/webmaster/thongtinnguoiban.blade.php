@extends('webmaster.master-layout.master-layout')
@section('content')





<div class="row">


                <div class="col-md-12 col-xs-12">

                  <div class="container white-box">
                    <h1 class="title-page">Thông tin chi tiết người bán</h1>
                    <h3 class="title-page">{{ $merchant->ten_dang_nhap }}</h3>
                    <div class="group-tabs">
                      <!-- Nav tabs -->
                      <ul class="nav nav-pills" role="tablist">
                   <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông tin cá nhân</a></li>
                   <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Các đơn hàng</a></li>
                   <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Các đơn mua tin</a></li>
                      <li role="presentation"><a href="#sl" aria-controls="sl" role="tab" data-toggle="tab">Số lần bị khóa</a></li>
                      <li role="presentation"><a href="#dg" aria-controls="dg" role="tab" data-toggle="tab">Đánh giá</a></li>
                 </ul>

                 </ul>

                      <!-- Tab panes -->
                      <div class="tab-content col-md-11">
                        <div role="tabpanel" class="tab-pane active" id="home">

                          <form class="form-horizontal form-material">
                            <div class="white-box">

                            <div class="form-group">
                                <label class="col-md-12">Tên Đăng Nhập</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{ $merchant->ten_dang_nhap }}" class="form-control form-control-line" disabled> </div>
                            </div>
                              <div class="form-group">
                                  <label class="col-md-12">Full Name</label>
                                  <div class="col-md-12">
                                      <input type="text" value="{{ $merchant->ho_ten}}" class="form-control form-control-line"  disabled> </div>
                              </div>
                              <div class="form-group">
                                  <label for="example-email" class="col-md-12">Email</label>
                                  <div class="col-md-12">
                                      <input type="email" value="{{ $merchant->email }}" class="form-control form-control-line" name="example-email" id="example-email"  disabled> </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-md-12">Số Điện Thoại</label>
                                  <div class="col-md-12">
                                      <input type="text" value="{{ $merchant->sdt }}" class="form-control form-control-line" disabled > </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-md-12">Địa chỉ</label>
                                  <div class="col-md-12">
                                      <input type="text" value="{{ $merchant->dia_chi }}" class="form-control form-control-line" disabled> </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-md-12">Số Tin Còn Lại</label>
                                  <div class="col-md-12">
                                      <input type="text" value="{{ $merchant->so_luong_tin }}" class="form-control form-control-line"  disabled> </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-md-12">Ngày tạo</label>
                                  <div class="col-md-12">
                                      <input type="text" value="{{ $merchant->created_at }}" class="form-control form-control-line" disabled> </div>
                              </div>

                          </form>


                        </div>





                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile">
                                  <div class="col-md-3 col-sm-8 col-xs-12 pull-left" style="margin-bottom:20px">
                                    <div class="row">
                                      <label>LỌC THEO TRẠNG THÁI :</label>
                                      <select id="stt" class="form-control pull-left" name="{{$merchant->id_m}}">
                                          <option value="0">Đang chờ xử lý</option>
                                          <option value="1">Đang giao</option>
                                          <option value="2" selected>Hoàn tất</option>
                                          <option value="3">Đã hủy</option>

                                      </select>
                                  </div>
                                </div>
                                @include('webmaster.tabledh-partial')


                          </div>

                                <div role="tabpanel" class="tab-pane" id="sl">

                                  <div class="white-box">
                                      <h3 class="box-title">TỔNG SỐ LẦN BỊ KHÓA : {{ count($khoas) }} </h3>
                                      <div class="table-responsive">
                                          <table class="table">
                                              <thead>
                                                  <tr>
                                                      <th>Thời điểm khóa</th>
                                                      <th>Lý do</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                @foreach($khoas as $k)
                                                <tr>
                                                    <td>{{ $k->created_at}}</td>
                                                    <td>{{ $k->li_do}}</td>
                                                </tr>
                                                @endforeach

                                              </tbody>
                                          </table>
                                      </div>
                                  </div>

                                </div>

                                <div role="tabpanel" class="tab-pane" id="messages">

                                  <table id="tableListBuy"  class="display" cellspacing="0" width="100%">
                                          <thead>
                                              <tr>
                                                  <th>Tên gói tin</th>
                                                  <th>Số lượng</th>
                                                  <th>Đơn giá (VNĐ)</th>
                                                  <th>Thành tiền (VNĐ)</th>
                                                  <th>Ngày giao dịch</th>

                                              </tr>
                                          </thead>

                                          <tbody>
                                          @foreach ($list_goitin as $item)
                                              <tr>

                                                  <td>Gói tin {{number_format($item->goitin->don_gia,0)}} </td>
                                                  <td>{{$item->so_luong}}</td>
                                                  <td>{{number_format($item->goitin->don_gia, 0,'', ',')}}</td>
                                                  <td>{{number_format($item->tong_tien, 0,'', ',') }}</td>
                                                  <td>{{$item->created_at}}</td>

                                              </tr>
                                          @endforeach

                                          </tbody>
                                      </table>
                                </div>


                                <div role="tabpanel" class="tab-pane" id="dg">

                                  <h3 class="box-title">ĐÁNH GIÁ </h3>
                                    ĐÁNH GIÁ TRUNG BÌNH :
                                    @if($danhgia->avg > 4.5)
                                      <strong style="font-size:20px;color:#23a033">{{ $danhgia->avg}}</strong>
                                    @elseif($danhgia->avg < 2.5 && $danhgia->avg > 0)
                                    <strong style="font-size:20px;color:#a30e0e">{{ $danhgia->avg}}</strong>
                                    @else
                                    <strong>{{ $danhgia->avg}}</strong>
                                    @endif
                                  </br>
                                    SỐ LƯỢT ĐÁNH GIÁ : {{ $danhgia->count}}</br>

                                    <div class="table-responsive">
                                    <table id="table_dg" class="table table-hover table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                  <th>Tên Người Mua</th>
                                                  <th>Điểm đánh giá</th>
                                                  <th>Ngày đánh giá</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                              <tr>
                                                <th>Tên Người Mua</th>
                                                <th>Điểm đánh giá</th>
                                                <th>Ngày đánh giá</th>
                                              </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($lst_danhgia as $dg)
                                            <tr>
                                              <td>  <a href="{{ route('thong_tin_customer_admin',['id'=>$dg->id_c]) }}">{{ $dg->customer->ten_dang_nhap }}</a></td>
                                                <td><span class="stars" data-rating="{{ number_format($dg->diem_so) }}" data-num-stars="5" > </span> &nbsp;&nbsp;&nbsp; </span>{{ $dg->avg }}</td>
                                                <td>{{ $dg->created_at}}</td>
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
            <!-- /.row -->
            <script type="text/javascript">
            $(document).ready(function() {
              $('#side-menu').children('a').each(function() {
                      if($(this).hasClass('active'))
                {
                  $(this).removeClass('active');
                }
              })
              $('#ql-nguoi-ban').addClass('active');


              //table


            });

            $('#stt').change(function(event) {
                  var stt = $('#stt').val();
                  var id_m = $(this).attr('name');

                  $.ajax({
                  url: '/webmaster/search-dh-tt',
                  type: 'GET',
                  dataType : 'html',
                  data: {tt: stt , id : id_m },
                  success:function(data) {
                    $("#myTable").html(data);
                  }
                })
            });

                $('#myTable').DataTable({
                    "language": {
                  "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json",
                },
                "order": [ 2, 'desc' ],
              });

              $('#table_dg').DataTable({
                  "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json",
              },
              "order": [ 2, 'desc' ],
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
