
@extends('webmaster.master-layout.master-layout')
@section('content')
<!-- row -->
<div class="row">

  @if(session('status'))
          <p class="alert alert-success">{{session('success')}}</p>
  @endif
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">DANH SÁCH QUẢN TRỊ VIÊN</h3>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                          <th>Tên Đăng Ký</th>
                                          <th>Email</th>
                                          <th>Ngày Đăng Ký</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($webmasters as $w)
                                      <tr>
                                          <td>{{ $w->ten_dang_nhap  }}</td>
                                          <td>{{ $w->email  }}</td>
                                          <td>{{ $w->created_at }}</td>
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
                  $('#side-menu').children('li').each(function() {
                          if($(this.a).hasClass('active'))
                    {
                      $(this).removeClass('active');
                    }
                  })
                  $('#ql-webmaster').addClass('active');
                });
                </script>

@endsection
