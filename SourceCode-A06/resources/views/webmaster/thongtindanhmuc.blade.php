@extends('webmaster.master-layout.master-layout')
@section('title_page')
Thông tin danh mục
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
                        <form class="form-horizontal form-material" method="post" action="{{ route('post-sua-danh-muc',['id'=>$danhmuc->id]) }}"  enctype="multipart/form-data">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="form-group">

                              <label class="col-md-12">Tên Danh mục</label>
                              <div class="col-md-12">
                                  <input type="text" name="tendanhmuc" value="{{ $danhmuc->ten_danh_muc }}" class="form-control form-control-line" > </div>
                          </div>
                            <div class="form-group">
                                <label class="col-md-12">Mô tả</label>
                                <div class="col-md-12">
                                    <input type="text" name ="mota" value="{{ $danhmuc->mo_ta }}" class="form-control form-control-line" > </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-12">Ảnh đại diện</label>
                              <div class="col-md-6">
                                    <input id="anh_dai_dien" type="file"  accept="image/jpg,image/jpeg,image/gif,image/tiff,image/x-png"  class="form-control" name="anh_dai_dien" value="{{ old('anh_dai_dien') }}">
                                </div>
                                <div class="col-md-4 img-wrap">

                                    <img src="/{{ $danhmuc->anh_dai_dien }}" width="50%" height="50%" alt="" id="anh_dai_dien">
                                    <div class="delete-img">
                                      <button type="button" class="btn btn-xs btn-danger xoa-anh">Xóa ảnh</button>
                                  </div>
                                </div>
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


            <style>
              .delete-img{
                position: absolute;
                top : 2px;
                right:52%;
              }
              .delete-img button{
                background-color: #f92721;
              }
              .delete-img button:hover{
                background-color: #a00c07;
              }

            </style>

            <script>

              $(document).ready(function() {
                $('.xoa-anh').click(function(event) {
                var img =   $( ".img-wrap" ).find( "img" );
                var cc = $(img).attr('src','#');
                $('.delete-img').css('visibility', 'hidden');
                $("#anh_dai_dien").attr("required", true);
                });
              }



            );

            </script>
@endsection
