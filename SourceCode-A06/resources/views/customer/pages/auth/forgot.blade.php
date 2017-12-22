@extends('customer.layouts.main')

@section('title', 'Nhập mật khẩu mới')

@section('content')
<main id="mainContent" class="main-content">
        <div class="page-container ptb-60">
            <div class="container">
                <section class="sign-area panel p-40">
                    <h3 class="sign-title">Khôi phục mật khẩu</h3>
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
                            <p>Vui lòng nhập địa chỉ email của bạn để lấy lại mật khẩu</p>
                            <form class="p-40 form-horizontal" method="POST" action="{{ route('customer.sendReset') }}">
                                {{ csrf_field() }}
                                <div class="form-group ">
                                    <label class="sr-only">Email</label>
                                    <input type="text" class="form-control input-lg" name="email" value="" placeholder="Nhập địa chỉ email" required>
                                        <span class="help-block">
                                            <strong></strong>
                                        </span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-lg">Lấy lại mật khẩu</button>
                                </div>
                                
                            </form>
                            
                        </div>


                       
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection
