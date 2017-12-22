@extends('webmaster.master-layout.master-layout')
@section('title_page')
Quản lý gói tin
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
                            <h3 class="box-title">DANH SÁCH GÓI TIN</h3>
                            <a href="{{route('them-goi-tin')}}"><button class="btn btn-success">Thêm Gói Tin</button></a>
                            <div class="table-responsive">
                                <table class="table" >
                                    <thead>
                                        <tr>
                                          <th>Giá Gói Tin (VNĐ)</th>
                                          <th>Số Lượng Tin Của Gói</th>
                                          <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($goitins as $goitin)
                                    <tr>
                                        <td>{{  number_format($goitin->don_gia,0)  }}</td>
                                        <td>{{  $goitin->so_luong }}</td>
                                        <td>
                                        <a href="{{ route('sua-goi-tin',['id'=> $goitin->id]) }}"><i class="fa fa-pencil-square-o fa-fw" aria-hidden="true"></i>Sửa</a>
                                        <a href="{{ route('xoa-goi-tin',['id'=> $goitin->id]) }}"><i class="fa fa-trash-o fa-fw" aria-hidden="true"></i>Xóa</a>
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
                  $('#ql-goi-tin').addClass('active');
                });
                </script>

@endsection
