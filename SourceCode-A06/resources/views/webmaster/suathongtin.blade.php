@extends('webmaster.master-layout.master-layout')
@section('title_page')
Sửa thông tin cá nhân
@endsection
@section('content')
<div class="row">

                <div class="col-md-12 col-xs-12">

                    <div class="white-box">
                      @if(session('success'))
                              <p class="alert alert-success">{{session('success')}}</p>
                      @endif
                      @if(session('fail'))
                              <p class="alert alert-danger">{{session('fail')}}</p>
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
                      <h2>ĐỔI EMAIL</h2>
                        <form class="form-horizontal form-material" method="post" action="{{ route('postsuathongtinwebmaster',['$id'=>Auth::guard('webmaster')->user()->id]) }}">
                           <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" value="{{ $w->email }}" class="form-control form-control-line" name="email" id="example-email" > </div>
                            </div>


                            <div class="form-group">
                            <div class="col-sm-12">
                                    <input type="submit" class="btn btn-success" value="Cập Nhật">
                            </div>
                          </div>
                        </form>
                    </div>
                    <div class="white-box">
                      <h2>ĐỔI MÂT KHẨU</h2>
                        <form class="form-horizontal form-material" method="post" action="{{ route('postsuapasswordwebmaster',['$id'=>Auth::guard('webmaster')->user()->id]) }}">
                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="form-group">
                              <label class="col-md-12">Password mới</label>
                              <div class="col-md-12">
                                  <input type="password" value="" class="form-control form-control-line" name="password" required> </div>
                          </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Nhập lại Password mới</label>
                                <div class="col-md-12">
                                    <input type="password" value="" class="form-control form-control-line" name="password_confirmation" required > </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12">Nhập password cũ</label>
                                <div class="col-md-12">
                                    <input type="password" value="" class="form-control form-control-line" name="old_password" required> </div>
                            </div>
                              <div class="form-group">
                            <div class="col-sm-12">
                                    <input type="submit" class="btn btn-success" value="Cập Nhật">
                            </div>
                          </div>
                        </form>
                    </div>


            </div>
            <!-- /.row -->
@endsection
