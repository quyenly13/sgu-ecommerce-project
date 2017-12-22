@extends('webmaster.master-layout.master-layout')
@section('title_page')
Thông tin gói tin 
@endsection
@section('content')
<div class="row">
  @if(session('success'))
          <p class="alert alert-success">{{session('success')}}</p>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="col-md-12 col-xs-12">
                    <div class="white-box">
                        <form class="form-horizontal form-material" method="post" action="{{ route('sua-goi-tin',['id'=>$goitin->id]) }}">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="form-group">

                              <label class="col-md-12">Giá gói tin</label>
                              <div class="col-md-12">
                                  <input type="text" name="giagoitin" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ $goitin->don_gia }}" class="form-control form-control-line" > </div>
                          </div>
                            <div class="form-group">
                                <label class="col-md-12">Số Lượng</label>
                                <div class="col-md-12">
                                    <input type="text" name ="soluong" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{ $goitin->so_luong }}" class="form-control form-control-line" > </div>
                            </div>
                              <div class="form-group">
                            <div class="col-sm-12">
                                    <input type="submit" class="btn btn-success" value="Cập Nhật">
                            </div>
                          </div>
                        </form>
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
                              $('#ql-goi-tin').addClass('active');
                            });
                            </script>
@endsection
