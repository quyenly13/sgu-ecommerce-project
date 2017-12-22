@extends('webmaster.master-layout.master-layout')
@section('title_page')
Thêm danh mục
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
                        <form class="form-horizontal form-material" method="post" action="{{ route('them-danh-muc') }}" enctype="multipart/form-data">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="form-group">

                              <label class="col-md-12">Tên Danh mục</label>
                              <div class="col-md-12">
                                  <input type="text" name="tendanhmuc" value="{{ old('tendanhmuc') }}" class="form-control form-control-line" > </div>
                          </div>
                            <div class="form-group">
                                <label class="col-md-12">Mô tả</label>
                                <div class="col-md-12">
                                    <input type="text" name ="mota" value="{{ old('mota') }}" class="form-control form-control-line" > </div>
                            </div>
                            <div class="form-group{{ $errors->has('anh_dai_dien') ? ' has-error' : '' }}">
                              <label class="col-md-12">Ảnh đại diện</label>
                              <div class="col-md-12">
                                    <input id="anh_dai_dien" type="file"  accept="image/jpg,image/jpeg,image/gif,image/tiff,image/x-png"  class="form-control" name="anh_dai_dien" value="{{ old('anh_dai_dien') }}" required autofocus>
                                </div>
                            </div>

                              <div class="form-group">
                            <div class="col-sm-12">
                                    <input type="submit" class="btn btn-success" value="Thêm">
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
                              $('#ql-danh-muc').addClass('active');
                            });

                            //tabledh

                            $('#myTable').DataTable({
                                "language": {
                              "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json",
                            },
                            "order": [ 2, 'desc' ],
                          });

                            </script>

@endsection
