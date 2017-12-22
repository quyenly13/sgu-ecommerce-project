@extends('customer.layouts.main')

@section('title', 'Đăng nhập bán hàng')

@section('content')
  <main id="mainContent" class="main-content">
        <div class="page-container ptb-60">
            <div class="container">
                <section class="sign-area panel p-40">
                  <h3 class="sign-title">Đăng nhập bán hàng <small>hoặc <a href="{{ route('merchant.register') }}" class="color-green">Đăng kí để trở thành người bán</a></small></h3>
                  <div class="row row-rl-0">
                        <div class="col-sm-6 col-md-7 ">
                         @if (Session::has('success'))
                            <p class="alert alert-success">{!! session('success') !!}</p>
                        @endif
                        
                        @if(Session::has('error'))
                        <p class="alert alert-danger">{!! session('error') !!}</p>
                        @endif

                                <form class="p-40 form-horizontal" method="POST" action="{{ route('merchant.login') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">Địa chỉ E-Mail</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('mat_khau') ? ' has-error' : '' }}">
                                        <label for="mat_khau" class="col-md-4 control-label">Mật khẩu</label>

                                        <div class="col-md-6">
                                            <input id="mat_khau" type="password" class="form-control" name="mat_khau" required>

                                            @if ($errors->has('mat_khau'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('mat_khau') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class=" col-md-6 col-md-offset-4">
                                            <a href=" {{ route('merchant.forgot') }}" class="forgot-pass-link color-green">Quên mật khẩu?</a>
                                        </div>
                                        
                                    </div>


                                    <div class="form-group ">
                                        <div class="col-md-6 custom-checkbox mb-20 col-md-offset-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Duy trì đăng nhập
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Đăng nhập
                                            </button>

                                        </div>
                                    </div>
                                </form>

                        </div>
                  </div>


                </section>
            </div>
        </div>
    </main>

@endsection
