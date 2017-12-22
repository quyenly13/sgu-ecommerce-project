@extends('merchants.master-layout.master-layout')
@section('title', 'Danh sách sản phẩm')
@section('title_page')
Danh sách sản phẩm
@endsection
@section('content')

            @if (Session::has('success'))
            <p class="alert alert-success">{!! session('success') !!}</p>
            @endif


<table id="myTable" class="display table" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Số lượng tồn</th>
                <th>Đơn giá (VNĐ)</th>
                <th class="hide">Xuất sứ</th>
                <th class="hide">Mô tả</th>
                <th class="hide">Danh mục</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
        @foreach ($list_post as $item)
            <tr class="post_line" data-id="{{$item->id}}" data-target="#detail_post">
                <td >{{$item->id}}</td>
              <td class="tensp_{{$item->id}}">  <a href="{{ route('chi-tiet-san-pham' , ['id'=>$item->id]) }}">{{$item->ten_san_pham}}</a></td>
                <td ><img src="/{{$item->anh_dai_dien}}" class="anh_{{$item->id}}" width="100" alt=""></td>
                @if($item->so_luong_ton_kho < 3)
                <td  class="text-danger soluong_{{$item->id}} soluong_edit" >{{$item->so_luong_ton_kho}}</td>
                @else
                <td  class="soluong_{{$item->id}} soluong_edit">{{$item->so_luong_ton_kho}}</td>
                @endif
                <td class="gia_{{$item->id}}">{{number_format($item->don_gia, 0,'', ',')}}</td>
                <td class="hidden xuatxu_{{$item->id}}">{{$item->xuat_xu}}</td>
                <td class="hidden mota_{{$item->id}}">{{$item->mo_ta}}</td>
                <td class="hidden danhmuc_{{$item->id}}">{{$item->ten_danh_muc}}</td>
                <td>
                <button data-id3="{{$item->id}}" class="btn btn-primary btn-xs btnxem" data-toggle="modal" data-target="#detail_post">Xem</button>

                <button data-id2="{{$item->id}}" class="btn btn-danger btn-xs btnxoa">Xóa</button>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <div class="modal fade" id="detail_post" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="title">Chi tiết sản phẩm</h4>
        </div>
        <div class="modal-body" id="detail">

        </div>
        </div></div></div>
   <br><br>
   <div class="row">
   <div class="panel panel-success">
        <div class="panel-heading">Sản phẩm bán chạy</div>
        <div class="panel-body">
        <table id="myTable_deal" class="display table table-bordered  table-hover table-striped" cellspacing="10px" width="100%">
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Số lượng tồn</th>
                <th>Đơn giá (VNĐ)</th>
                <th>Danh mục</th>
                <th>Số lượng được đặt</th>
                <th>Tổng tiền dự kiến (VNĐ)</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($list_post_deal as $item)
            <tr class="post_line" data-id="{{$item->id}}" data-target="#detail_post">
                <td>{{$item->id}}</td>
                  <td class="tensp_{{$item->id}}">  <a href="{{ route('chi-tiet-san-pham' , ['id'=>$item->id]) }}">{{$item->ten_san_pham}}</a></td>
                <td><img src="/{{$item->anh_dai_dien}}" width="100" alt=""></td>
                @if($item->so_luong_ton_kho < 3)
                <td data-id3="{{$item->id}}" class="text-danger " >{{$item->so_luong_ton_kho}}</td>
                @else
                <td data-id3="{{$item->id}}">{{$item->so_luong_ton_kho}}</td>
                @endif
                <td>{{number_format($item->don_gia, 0,'', ',')}}</td>
                <td>{{$item->ten_danh_muc}}</td>
                <td>{{$item->soluongdat}}</td>
                <td>{{number_format( $item->soluongdat * $item->don_gia , 0,'', ',')}}</td>
            </tr>
        @endforeach

        </tbody>
        </table>
        </div>
    </div>
   </div>

  <script>
  $(document).ready(function(){

    function edit_data(id, soluong)
      {

           $.ajax({
                url:"/merchant/update_quantity_post",
                method:"get",
                data:{id:id, soluong:soluong},
                success:function(data){
                    window.location.href = '/merchant/post_product_list';
                }
           });
      }

      $(document).on('click','.soluong',function(){
        var id= $(this).data('id1');
        console.log(id);
        $(".soluong_"+id).attr('contenteditable',true).focus();
      });
      $(document).on('click','.btnxoa',function(){
        var id= $(this).data('id2');
       if(confirm("Bạn có chắc muốn xóa?"))
       {
        $.ajax({
                url:"/merchant/del_quantity_post",
                method:"get",
                data:{id:id},
                success:function(data){
                    window.location.href = '/merchant/ton-kho';
                }
           });
       }
      });
      $(document).on('click',".btnxem",function(){
        var id=$(this).data('id3');
        var tensp = $(".tensp_"+id).text();
        var src_anh = $(".anh_"+id).attr('src');
        var soluong=$(".soluong_"+id).text();
         var gia = $(".gia_"+id).text();
        var xuatxu = $(".xuatxu_"+id).text();
        var mota = $(".mota_"+id).text();
        var danhmuc = $(".danhmuc_"+id).text();
        $("#detail").html('\
        <div><label for=""  class="col-sm-3">Tên sản phẩm: </label><span>'+tensp+'</span><br><br>\
        <label for="" class="col-sm-3">Ảnh: </label><img src="'+src_anh+'" width="100px" alt=""><br><br>\
        <label for="" class="col-sm-3">Số lượng: </label><span>'+soluong+'</span><br><br>\
        <label for="" class="col-sm-3">Giá: </label><span>'+gia+'</span><br><br>\
        <label for="" class="col-sm-3">Mô tả: </label><span class="col-sm-9">'+mota+'</span><br><br><br>\
        <label for="" class="col-sm-3">Xuất xứ: </label><span>'+xuatxu+'</span><br><br>\
        <label for="" class="col-sm-3">Danh mục: </label><span>'+danhmuc+'</span><br><br>\
        </div>\
        ');
      });
      $(document).on('keydown', '.soluong_edit', function(e){
          if(e.which == 13)
          {
            var id = $(this).data("id3");
           var soluong = parseInt($(this).text());
           edit_data(id, soluong);
           console.log(id,soluong);
          }
      });
  });
  </script>

  <script type="text/javascript">
  $(document).ready(function() {
    $('#side-menu').children('a').each(function() {
            if($(this).hasClass('active'))
      {
        $(this).removeClass('active');
      }
    })
    $('#ton-kho').addClass('active');
  });
  </script>

@endsection
