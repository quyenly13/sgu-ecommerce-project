@extends('customer.layouts.main')

@section('title', 'Đăng nhập')

@section('content')


    <main id="mainContent" class="main-content">
        <div class="page-container ptb-60">
            <div class="container">
              @if(Session::has('error'))
               <div class = "alert alert-danger">Lỗi xảy ra </div>
              @elseif(Session::has('success'))
               <div class = "alert alert-success">Kích hoạt thành công</div>
               @elseif(Session::has('errorDN'))
       <div class = "alert alert-danger">Bạn cần kích hoạt tài khoản trước khi đăng nhập  </div>

              @endif
                <section class="sign-area panel p-40">
                    <h3 class="sign-title">Đăng nhập <small>hoặc <a href="{{ route('customer.register') }}" class="color-green">Đăng kí</a></small></h3>
                    <div class="row row-rl-0">
                        <div class="col-sm-6 col-md-7 ">
                             @if (session()->has('status') > 0)
                                <div class="am-alert am-alert-success" data-am-alert>
                                    <button type="button" class="am-close">&times;</button>
                                    <p>{{ session('status') }} Vui lòng kiểm tra email để kích hoạt tài khoản</p>
                                </div>
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
                            <form class="p-40 form-horizontal" method="POST" action="{{ route('customer.postLogin') }}">
                                {{ csrf_field() }}


                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <!-- <label class="sr-only">email</label> -->
                                    <input type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" placeholder="Nhập email" required>
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="sr-only">Password</label>
                                    <input type="password" class="form-control input-lg" name="password" placeholder="Mật khẩu" required>
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <a href=" {{ route('customer.forgot') }}" class="forgot-pass-link color-green">Quên mật khẩu?</a>
                                </div>
                                <div class="custom-checkbox mb-20">
                                    <input type="checkbox" name="remember" id="remember" >
                                    <label class="color-mid" for="remember">Duy trì đăng nhập</label>
                                </div>
                                <button type="submit" class="btn btn-block btn-lg">Đăng nhập</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection
