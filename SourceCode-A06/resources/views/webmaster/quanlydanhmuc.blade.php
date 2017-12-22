@extends('webmaster.master-layout.master-layout')
@section('title_page')
Quản lý danh mục
@endsection
@section('content')
<!-- row -->




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
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">DANH SÁCH DANH MỤC</h3>
                            <a href="{{route('them-danh-muc')}}"><button class="btn btn-success">Thêm Danh Mục</button></a></br></br>
                            <div class="table-responsive">
                                <table class="display" id="tabledm">
                                    <thead>
                                        <tr>
                                          <th>Ảnh đại diện</th>
                                          <th>Tên Danh Mục</th>
                                          <th>Ngày Tạo</th>
                                          <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($danhmucs as $danhmuc)
                                    <tr>
                                    <td><img src="/{{$danhmuc->anh_dai_dien}}" width="100" alt=""></td>
                                        <td><a href="{{ route('product-cate',['id'=>$danhmuc->id]) }}">{{  $danhmuc->ten_danh_muc  }}</a></td>
                                        <td>{{  $danhmuc->created_at }}</td>
                                        <td>
                                        <a href="{{ route('sua-danh-muc',['id'=> $danhmuc->id]) }}"><i class="fa fa-pencil-square-o fa-fw" aria-hidden="true"></i>Sửa</a>
                                        <a href="{{ route('xoa-danh-muc',['id'=> $danhmuc->id]) }}"><i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>Xóa</a>
                                      </td>
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
                  $('#ql-danh-muc').addClass('active');
                });

                $("#tabledm").DataTable({
                    "language": {
                  "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json",
                }
              });
                </script>

@endsection
