@extends('customer.layouts.main')

@section('title', 'Thông tin cá nhân')

@section('content')
 <main id="mainContent" class="main-content">
    <div class="page-container ptb-10">
        <div class="container">
            <div class="section deals-header-area">
                <div class="row row-tb-20">
                    <div class="menu-profile col-xs-12 col-md-4 col-lg-3">
                        <ul>
                            <li class="person">
                                <strong>Thông tin cá nhân</strong>
                            </li>
                            <li class="person">
                                <ul>
                                    <li class=""> <a href="{{ route('profile') }}">Thông tin cơ bản</a></li>
                                    <li class=""> <a href="{{ route('password') }}">Mật khẩu</a></li>
                                    <li class="active"> <a href="{{ route('history-order') }}">Lịch sử mua hàng</a></li>


                                </ul>
                            </li>

                        </ul>
                    </div>
                    <div class="col-xs-12 col-md-8 col-lg-9">
                        <section class="section latest-deals-area">
                            <div class="main-wrap">
                                <div class="user-info">
                                    <div class="am-cf am-padding">
                                        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">Lịch sử mua hàng </strong></div>
                                    </div>
                                    <hr/>
                                    <div class="col-xs-12 col-md-8 col-lg-12">

                                      <table class="table table-hover" id="table_donhang">
                                          <thead>
                                           <tr>
                                             <th>Ngày mua</th>
                                             <th>Địa chỉ giao</th>
                                                     <th>Tổng tiền (VNĐ)</th>
                                             <th>Chi Tiết</th>
                                           </tr>
                                          </thead>
                                          <tfoot>
                                            <tr>
                                              <th>Ngày mua</th>
                                              <th>Địa chỉ giao</th>
                                              <th>Tổng tiền (VNĐ)</th>
                                              <th>Chi Tiết</th>
                                            </tr>
                                          </tfoot>
                                          <tbody>
                                            @foreach ($hoadon as $item)

                                            <tr>
                                                <td>{{$item->created_at}}</td>
                                                <td>{{$item->dia_chi}}</td>
                                                <td>{{number_format($item->tong_tien)}}</td>
                                              <td><button class="btn btn-xs xemchitiet" id="{{$item->id}}" data-toggle="modal" data-target="#myModal"> Xem Chi Tiết </button></td>
                                            </tr>
                                            @endforeach
                                          </tbody>
                                          </table>

                                    </div>
                                </div>
                            </div>

                              <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                 <div class="modal-content" id="cthd-container">
                                   @isset($cthd)
                                   @include('customer.layouts.modalctdh-partial');
                                   @endisset
                                 </div>
                                </div>
                                </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@section('script')
<script type="text/javascript">
      $(document).ready(function() {
        $('#table_donhang').DataTable({
          "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Vietnamese.json",
      }
        });
        $(".xemchitiet").click(function(event) {
           event.preventDefault();
           var iddh =  $(this).attr('id');
           //console.log(id);
          $.ajax({
            url: '/chi-tiet-don-hang/',
            type: 'GET',
            dataType : 'html',
            data: {id: iddh },
            success:function(data) {
              $("#cthd-container").html(data);
              //console.log('du');
            }
        })
      })
      });
</script>
@endsection
