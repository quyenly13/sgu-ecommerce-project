@extends('customer.layouts.main')

@section('title', 'Đăng kí người bán')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <!-- @if(count($errors)>0)
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{$error}}</p>
            @endforeach
        @endif -->
            <div class="panel panel-default mt-20 mb-20">

                <div class="panel-heading">Đăng ký bán hàng</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('merchant.register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('ten_dang_nhap') ? ' has-error' : '' }}">
                            <label for="ten_dang_nhap" class="col-md-4 control-label">Tên cửa hàng</label>

                            <div class="col-md-6">
                                <input id="ten_dang_nhap" type="text" class="form-control" name="ten_dang_nhap" value="{{ old('ten_dang_nhap') }}" pattern="^[A-Za-z0-9_]{1,32}$" onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 8 || event.charCode == 32 || (event.charCode >= 48 && event.charCode <= 57));" required autofocus>

                                @if ($errors->has('ten_dang_nhap'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ten_dang_nhap') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Địa chỉ E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mật khẩu (Tối thiểu 6 chữ số)</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Nhập lại mật khẩu</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ho_ten') ? ' has-error' : '' }}">
                            <label for="ho_ten" class="col-md-4 control-label">Họ Tên</label>

                            <div class="col-md-6">
                                <input id="ho_ten" type="text" class="form-control" name="ho_ten" value="{{ old('ho_ten') }}"  required autofocus>

                                @if ($errors->has('ho_ten'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ho_ten') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sdt') ? ' has-error' : '' }}">
                            <label for="sdt" class="col-md-4 control-label">Số điện thoại </label>

                            <div class="col-md-6">
                                <input id="sdt" type="text" onkeypress="return (event.charCode > 47 && event.charCode < 58)"  pattern="(09|01[2|6|8|9])+([0-9]{8})\b" class="form-control" name="sdt" value="{{ old('sdt') }}" required autofocus>

                                @if ($errors->has('sdt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sdt') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('dia_chi') ? ' has-error' : '' }}">
                            <label for="dia_chi" class="col-md-4 control-label">Địa chỉ</label>

                            <div class="col-md-6">
                                <input id="dia_chi" type="text" class="form-control" name="dia_chi" value="{{ old('dia_chi') }}" required autofocus>

                                @if ($errors->has('dia_chi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dia_chi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('so_tk') ? ' has-error' : '' }}">
                            <label for="so_tk" class="col-md-4 control-label">Tài khoản ngân hàng (Từ 6 đến 20 kí tự số)</label>

                            <div class="col-md-6">
                                <input id="so_tk" type="text" class="form-control"  onkeypress="return (event.charCode > 47 && event.charCode < 58)"   pattern="[0-9]{6,20}"   name="so_tk" value="{{ old('so_tk') }}" required autofocus>

                                @if ($errors->has('so_tk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('so_tk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('so_cmnd') ? ' has-error' : '' }}">
                            <label for="so_cmnd" class="col-md-4 control-label">Chứng minh thư (9 kí tự số)</label>

                            <div class="col-md-6">
                                <input id="so_cmnd" type="text" class="form-control" onkeypress="return (event.charCode > 47 && event.charCode < 58)"  pattern="[0-9]{9}"  name="so_cmnd" value="{{ old('so_cmnd') }}" required autofocus>

                                @if ($errors->has('so_cmnd'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('so_cmnd') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                            <!-- <label class="col-md-4 control-label" for="gioi_tinh">Giới tính</label> -->
                            <div class="form-group  ">
                            <label  for="gioi_tinh"   class="control-label col-md-4">Giới tính </label>
                                <div class="custom-radio col-md-6">
                                    <div style="display: inline-block">
                                        <input type="radio" class="" id="sex_man" name="gioi_tinh" value="Nam" checked>
                                        <label class="color-mid" for="sex_man">
                                            Nam
                                        </label>
                                    </div>
                                    <div style="display: inline-block; padding-left: 30px;">
                                        <input type="radio" id="sex_human" value="Nữ" name="gioi_tinh" >
                                        <label class="color-mid" for="sex_human">
                                            Nữ
                                        </label>
                                    </div>
                                </div>


                                </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Đăng kí
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
