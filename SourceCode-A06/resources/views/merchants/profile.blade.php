@extends('merchants.master-layout.master-layout')
@section('title', 'Thông tin người dùng')
@section('title_page')
Thông tin người dùng
@endsection
@section('content')


            <div class="container">
            <div id="alertbox" class="hide">
            @if (Session::has('success'))
            <p class="alert alert-success">{!! session('success') !!}</p>
            @endif
            @if(count($errors)>0)
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach
            @endif
            </div>
                <div class="row">

                    <div class="col-md-7 col-xs-12">
                        <div class="white-box">
                        <form class="form-horizontal  form-material" method="POST" action="{{ route('merchant.updateProfile') }}">
                        {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('ten_dang_nhap') ? ' has-error' : '' }}">
                                    <label for="ten_dang_nhap" class="col-md-12">Tên cửa hàng</label>
                                    <div class="col-md-12">
                                        <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" value="{{$merchant->ten_dang_nhap}}" class="form-control form-control-line" onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57));"  pattern="^[A-Za-z0-9_]{1,32}$"> </div>
                                        @if ($errors->has('ten_dang_nhap'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ten_dang_nhap') }}</strong>
                                        </span>
                                        @endif
                                </div>

                                <div class="form-group{{ $errors->has('ho_ten') ? ' has-error' : '' }}">
                                    <label for="ho_ten" class="col-md-12">Họ tên</label>
                                    <div class="col-md-12">
                                        <input type="text" value="{{$merchant->ho_ten}}" class="form-control form-control-line" name="ho_ten" id="ho_ten" > </div>
                                        @if ($errors->has('ho_ten'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ho_ten') }}</strong>
                                        </span>
                                        @endif
                                </div>

                                <div class="form-group{{ $errors->has('dia_chi') ? ' has-error' : '' }}">
                                    <label for="dia_chi" class="col-md-12">Địa chỉ</label>
                                    <div class="col-md-12">
                                        <input type="text" id="dia_chi" name="dia_chi" value="{{$merchant->dia_chi}}"  class="form-control form-control-line"> </div>
                                        @if ($errors->has('dia_chi'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('dia_chi') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                <div class="form-group{{ $errors->has('so_tk') ? ' has-error' : '' }}">
                                    <label for="so_tk" class="col-md-12">Số tài khoản</label>
                                    <div class="col-md-12">
                                        <input type="text" id="so_tk" name="so_tk"  onkeypress="return (event.charCode > 47 && event.charCode < 58)"  regex="^[0][9]{12,20}$"  value="{{$merchant->so_tk}}"  class="form-control form-control-line"> </div>
                                        @if ($errors->has('so_tk'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('so_tk') }}</strong>
                                        </span>
                                        @endif
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12" for="gioi_tinh">Giới tính</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="btn-group radio-group">

                                            @if($merchant->gioi_tinh == "Nữ")

                                            <label class="btn btn-success not-active">Nam <input type="radio" value="Nam" name="gioi_tinh"></label>
                                            <label class="btn btn-success active">Nữ <input type="radio" checked="true" value="Nữ" name="gioi_tinh"></label>
                                           @else
                                           <label class="btn btn-success active">Nam <input type="radio" checked="true"  value="Nam" name="gioi_tinh"></label>
                                            <label class="btn btn-success not-active">Nữ <input type="radio"value="Nữ" name="gioi_tinh"></label>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Số lượng tin có thể đăng</label>
                                    <div class="col-md-12">
                                    @if($merchant->so_luong_tin > 10)
                                        <span class="text-blue">{{$merchant->so_luong_tin}}</span>
                                    @else
                                        <span class="text-danger">{{$merchant->so_luong_tin}}</span>
                                        <br>
                                        <a href="{{route('merchant.create_bill')}}">Mua thêm tin</a>
                                    @endif
                                    </div>
                                </div>

                               <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success">Cập nhật thông tin</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                   <div class="col-md-4 col-xs-12">

                    <div class="white-box">
                        <form class="form-horizontal form-material" method="POST" action="{{route('merchant.updateinfo')}}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" value="{{$merchant->email}}" class="form-control form-control-line" name="email" id="email"> </div>
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        Đổi email
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="white-box">
                        <form class="form-horizontal form-material" method="POST" action="{{route('merchant.updateinfo')}}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('sdt') ? ' has-error' : '' }}">
                            <label for="sdt" class="col-md-12">Số điện thoại</label>
                            <div class="col-md-12">
                                <input type="text" id="sdt" name="sdt" pattern="^[0][9]{9,12}$" value="{{$merchant->sdt}}" class="form-control form-control-line"> </div>
                                @if ($errors->has('sdt'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sdt') }}</strong>
                                </span>
                                @endif
                        </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        Đổi số điện thoại
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="white-box">
                        <form class="form-horizontal form-material" method="POST" action="{{ route('merchant.changepassword') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password_old" class="col-md-12 ">Mật khẩu hiện tại</label>

                                <div class="col-md-12">
                                    <input id="password_old" type="password" class="form-control" name="password_old" required>


                                    @if ($errors->has('password_old'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_old') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-12 ">Mật khẩu mới</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-12 ">Nhập lại mật khẩu</label>

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-success">
                                        Đổi mật khẩu
                                    </button>
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
                  $('#thongtin').addClass('active');
                });
                </script>
   </div>
@endsection
