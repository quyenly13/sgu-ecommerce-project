@extends('customer.layouts.main')

@section('title', 'Nhập mật khẩu mới')

@section('content')
<main id="mainContent" class="main-content">
        <div class="page-container ptb-60">
            <div class="container">
                <section class="sign-area panel p-40">
                    <h3 class="sign-title">Khôi phục mật khẩu Người bán</h3>
                    <div class="row row-rl-0">
                        <div class="col-sm-6 col-md-7">
                            @if (session()->has('status') > 0)
                                <div class="am-alert am-alert-success" data-am-alert>
                                    <button type="button" class="am-close">&times;</button>
                                    <p>{{ session('status') }}</p>
                                </div>
                            @endif
                            @if ($errors->count() > 0)
                                <div class="am-alert am-alert-danger" data-am-alert>
                                    <button type="button" class="am-close">&times;</button>
                                    <p>{{ $errors->first() }}</p>
                                </div>
                            @endif
                            <form class="p-40 form-horizontal" method="POST" action=" {{ route('merchant.saveNewPassword') }}">
                                {{ csrf_field() }}
                                 <p>Email</p>
                                <div class="form-group ">
                                    <label for="email" class="sr-only">email</label>
                                    <input type="email" class="form-control input-lg" name="email" value="{{$email}}" placeholder="" readonly="readonly">
                                        <span class="help-block">
                                            <strong></strong>
                                        </span>
                                   
                                </div>
                                <p>Nhập mật khẩu mới</p>
                                <div class="form-group ">
                                    <label for="password" class="sr-only">Mật khẩu</label>
                                    <input type="password" class="form-control input-lg" name="password" value="" placeholder="Nhập mật khẩu mới" required>
                                    
                                        <span class="help-block">
                                            <strong></strong>
                                        </span>
                                   
                                </div>

                                <p>Nhập lại mật khẩu mới</p>
                                <div class="form-group ">
                                    <label or="password_confirmation" class="sr-only">Nhập lại mật khẩu</label>
                                    <input type="password" class="form-control input-lg" name="password_confirmation" value="" placeholder="Nhập lại mật khẩu" required>
                                    
                                        <span class="help-block">
                                            <strong></strong>
                                        </span>
                                   
                                </div>

                                <button type="submit" class="btn btn-block btn-lg">Xác nhận</button>
                            </form>
                            
                        </div>


                       
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection
