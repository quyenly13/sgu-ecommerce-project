@extends('customer.layouts.main')

@section('title', 'Đăng kí')

@section('content')
    <main id="mainContent" class="main-content">
        <div class="page-container ptb-60">
            <div class="container">
                @if (session()->has('status'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ session('status') }}
                    </div>
                @endif
                <section class="sign-area panel p-40">
                    <h3 class="sign-title">Đăng kí <small>hoặc <a href="{{ route('customer.login') }}" class="color-green">Đăng nhập</a></small></h3>
                    <div class="row row-rl-0">
                        <div class="col-sm-6 col-md-7 ">
                            <form class="p-40" id="register_form" method="post" action="{{ route('customer.register') }}">

                                {{ csrf_field() }}

                                <div class="form-group {{ $errors->has('ho_ten') ? ' has-error' : '' }}">
                                    <label for="ho_ten" class="control-label">Họ Tên</label>
                                    <input type="text" class="form-control input-lg" pattern="/[^a-zA-Z_\x{00C0}-\x{00FF}\x{1EA0}-\x{1EFF}]/u"  placeholder="Họ và tên" name="ho_ten" value="{{ old('ho_ten') }}" required autofocus>
                                        @if ($errors->has('ho_ten'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ho_ten') }}</strong>
                                        </span>
                                        @endif

                                </div>

                                <div class="form-group {{ $errors->has('emailExist') ? ' has-error' : '' }}">
                                    <label for="email" class="control-label">Email</label>
                                    <input type="email" class="form-control input-lg"  placeholder="Nhập email" name="email" value="{{ old('email')}}" required>
                                         @if ($errors->has('emailExist'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('emailExist') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                <div class="form-group {{ $errors->has('ten_dang_nhap') ? ' has-error' : '' }}">
                                    <label for="ten_dang_nhap" class="control-label">Tên đăng nhập</label>
                                    <input type="text" class="form-control input-lg" pattern="^[A-Za-z0-9_]{1,32}$"  placeholder="Tên đăng nhập" name="ten_dang_nhap" value="{{ old('ten_dang_nhap')}}" required>
                                         @if ($errors->has('ten_dang_nhap'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ten_dang_nhap') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                <div class="form-group {{ $errors->has('sdt') ? ' has-error' : '' }}">
                                      <label for="ten_dang_nhap" class="control-label">Số điện thoại (Gồm 9-12 số)</label>
                                    <input type="number" class="form-control input-lg" placeholder="Số điện thoại" name="sdt" value="{{ old('sdt')}}"  id="sdt" required>
                                        @if ($errors->has('sdt'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sdt') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                <div class="form-group {{ $errors->has('dia_chi') ? ' has-error' : '' }}">
                                    <label  for="dia_chi"   class="control-label">Địa chỉ </label>
                                    <input type="text" class="form-control input-lg" placeholder="Địa chỉ" name="dia_chi" value="{{ old('dia_chi')}}" required>
                                         @if ($errors->has('dia_chi'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('dia_chi') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                <label  for="sex"   class="control-label">Giới tính </label>
                                <div class="form-group custom-radio ">

                                    <div style="display: inline-block">
                                        <input type="radio" class="" id="sex_man" name="sex" value="1" checked>
                                        <label class="color-mid" for="sex_man">
                                            Nam
                                        </label>
                                    </div>
                                    <div style="display: inline-block; padding-left: 30px;">
                                        <input type="radio" id="sex_human" value="0" name="sex" >
                                        <label class="color-mid" for="sex_human">
                                            Nữ
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label  for="password"   class="control-label">Mật khẩu (dài tối thiểu 6 kí tự) </label>
                                    <input type="password" class="form-control input-lg" placeholder="Mật khẩu" name="password" id="password" required>
                                     @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label  for="password_confirmation" class="control-label">Nhập lại mật khẩu</label>
                                    <input type="password" class="form-control input-lg" placeholder="Nhập lại mật khẩu" id="password_confirmation" name="password_confirmation" required>
                                </div>
                                <button type="submit" class="btn btn-block btn-lg">Đăng kí</button>
                            </form>

                        </div>

                    </div>
                </section>
            </div>
        </div>


    </main>
@endsection
