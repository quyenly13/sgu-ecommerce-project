@extends('webmaster.master-layout.master-layout')
@section('title_page')
Danh sách người bán
@endsection
@section('content')
<!-- row -->
<div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">DANH SÁCH NGƯỜI BÁN</h3>
                            <div class="table-responsive">
                                <table class="display" id="tablenb" >
                                    <thead>
                                        <tr>
                                          <th>Tên Đăng Ký</th>
                                          <th>Họ Và Tên</th>
                                          <th>Email</th>
                                          <th>Ngày Đăng Ký</th>
                                          <th>Xem Chi Tiết</th>
                                          <th>Khóa tài khoản</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($merchants as $merchant)
                                    <tr>
                                        <td><a href="{{route('product-mer',['id'=>$merchant->id_m])}}">{{ $merchant->ten_dang_nhap  }}</a></td>
                                        <td>{{ $merchant->ho_ten  }}</td>
                                        <td>{{ $merchant->email  }}</td>
                                        <td>{{ $merchant->created_at  }}</td>
                                        <td><a href="{{route('thong_tin_merchant_admin',['id'=> $merchant->id_m])}}"> Xem Chi Tiết </a></td>
                                        @if($merchant->trang_thai==-1)
                                        <td><a href="{{route('mo_khoa_merchant',['id'=> $merchant->id_m])}}" class="btn-sm btn-info">Mở khóa tài khoản</a></td>
                                        @else
                                        <td><button class="btn-sm btn-danger ktk"  data-toggle="modal" data-target="#myModal" id="{{$merchant->id_m}}">Khóa tài khoản</button></td>
                                        @endif

                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Khóa tài khoản</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('khoa_merchant') }}">

                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="id_m" value="" id="id_m"/>
          <div class="form-group">
              <label class="col-md-12">Lý do khóa</label>
                  <input type="text" value="" class="form-control form-control-line" name="li_do" placeholder="Điền lý do khóa " required>
                 </div>

                 <div class="form-group">
                       <button type="submit" class="btn btn-danger" >Khóa tài khoản</button>
                 </div>

            </div>

        </form>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Đóng</button>
      </div>
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
                  $('#ql-nguoi-ban').addClass('active');
                });
                $("#tablenb").DataTable({
                    "language": {
                  "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json",
                }
              });

              $(".ktk").click(function(event) {
                var id = $(this).attr('id');
                $('#id_m').val(id);
                console.log(id);
              });
                </script>

@endsection
