@extends('webmaster.master-layout.master-layout')
@section('title_page')
Danh sách người mua
@endsection
@section('content')
<!-- row -->
<div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">DANH SÁCH NGƯỜI MUA</h3>
                            <div class="table-responsive">
                                <table class="display" id="tablenm">
                                    <thead>
                                        <tr>
                                            <th>Tên Đăng Ký</th>
                                            <th>Họ Và Tên</th>
                                            <th>Email</th>
                                            <th>Ngày Đăng Ký</th>
                                            <th>Xem Chi Tiết</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customers as $cus)
                                    <tr>
                                        <td>{{ $cus->ten_dang_nhap  }}</td>
                                        <td>{{ $cus->ho_ten  }}</td>
                                        <td>{{ $cus->email  }}</td>
                                        <td>{{ $cus->created_at  }}</td>
                                        <td><a href="{{route('thong_tin_customer_admin',['id'=> $cus->id_c])}}"> Xem Chi Tiết </a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
                  $('#ql-nguoi-mua').addClass('active');
                });
                $("#tablenm").DataTable({
                    "language": {
                  "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json",
                }
              });
                </script>

@endsection
