@extends('webmaster.master-layout.master-layout')
@section('title_page')
Xử lý khóa tài khoản
@endsection
@section('content')
<!-- row -->
<div class="row">
                    <div class="col-sm-12">

                      @if (Session::has('success'))
                      <div class="alert alert-success">
                        <ul>
                          <li>{!! Session::get('success') !!}</li>
                        </ul>
                      </div>
                      @endif

                        <div class="white-box">
                            <h3 class="box-title">DANH SÁCH NGƯỜI BÁN BỊ KHÓA</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Tên Đăng Ký</th>
                                            <th>Họ Và Tên</th>
                                            <th>Số lần bị khóa</th>
                                            <th>Lý do</th>
                                            <th>Thời điểm khóa</th>
                                            <th>Mở Khóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $i = -1; ?>
                                      @foreach($tkbk as $tk)
                                      <tr class = "clickable-row" data-href=" {{ route('thong_tin_merchant_admin',['id'=> $tk->id_m]) }} ">
                                            <?php $i++; ?>
                                          <td>{{ $tk->merchant->ten_dang_nhap}}</td>
                                          <td>{{ $tk->merchant->ho_ten   }}</td>
                                          <td> {!! $count[$i]->so_lan  !!}</td>
                                          <td>{{ $tk->li_do}}</td>
                                          <td>{{ $tk->created_at}}</td>
                                          <td><a href="{{route('mo_khoa_merchant',['id'=> $tk->id_m])}}"><button type="button" class="btn btn-success">Mở khóa</button></a></td>
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
                  $('#xu-li-khoa-tk').addClass('active');
                });
                </script>

@endsection
