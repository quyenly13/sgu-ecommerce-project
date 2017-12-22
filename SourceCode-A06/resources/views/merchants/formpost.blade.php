@extends('merchants.master-layout.master-layout')
@section('title', 'Đăng tin')
@section('title_page')
Đăng tin
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div id="alertbox" class="hide">
            @if (Session::has('success'))
            <p class="alert alert-success">{!! session('success') !!}</p>
            @endif

            @if (Session::has('error'))
            <p class="alert alert-danger">{!! session('error') !!}</p>
            @endif

        </div>

            <div class="panel panel-default">

                <div class="panel-heading">Điền thông tin bài đăng</div>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('merchant.create_post') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('ten_san_pham') ? ' has-error' : '' }}">
                            <label for="ten_san_pham" class="col-md-4 control-label">Tên sản phẩm</label>

                            <div class="col-md-6">
                                <input id="ten_san_pham" type="text" class="form-control" name="ten_san_pham" value="{{ old('ten_san_pham') }}" required autofocus>

                                @if ($errors->has('ten_san_pham'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ten_san_pham') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ma_danh_muc') ? ' has-error' : '' }}">
                            <label for="ma_danh_muc" class="col-md-4 control-label">Danh mục</label>

                            <div class="col-md-6">
                                <select id="ma_danh_muc" name="ma_danh_muc" class="form-control">

                                   @foreach ($cates as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->ten_danh_muc }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('ma_danh_muc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ma_danh_muc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('so_luong_ton_kho') ? ' has-error' : '' }}">
                            <label for="so_luong_ton_kho" class="col-md-4 control-label">Số lượng</label>

                            <div class="col-md-6">
                                <input id="so_luong_ton_kho" type="number" class="form-control" name="so_luong_ton_kho" value="{{ old('so_luong_ton_kho') }}" required>

                                @if ($errors->has('so_luong_ton_kho'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('so_luong_ton_kho') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('don_gia') ? ' has-error' : '' }}">
                            <label for="don_gia" class="col-md-4 control-label">Đơn giá (VNĐ)</label>

                            <div class="col-md-6">
                                <input id="don_gia" type="text" class="form-control" value="{{ old('don_gia') }}" name="don_gia" required>

                                @if ($errors->has('don_gia'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('don_gia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('xuat_xu') ? ' has-error' : '' }}">
                            <label for="xuat_xu" class="col-md-4 control-label">Xuất xứ</label>

                            <div class="col-md-6">
                                <input id="xuat_xu" type="text" class="form-control" name="xuat_xu" value="{{ old('xuat_xu') }}" required autofocus>

                                @if ($errors->has('xuat_xu'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('xuat_xu') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mo_ta') ? ' has-error' : '' }}">
                            <label for="mo_ta" class="col-md-4 control-label">Mô tả</label>

                            <div class="col-md-6">
                            <textarea class="form-control" name="mo_ta" id="mo_ta" rows="3">{{ old('mo_ta') }}</textarea>

                                @if ($errors->has('mo_ta'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mo_ta') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('anh_dai_dien') ? ' has-error' : '' }}">
                            <label for="anh_dai_dien" class="col-md-4 control-label">Ảnh sản phẩm</label>

                            <div class="col-md-6">
                                <input id="anh_dai_dien" type="file" class="form-control" name="anh_dai_dien" value="{{ old('anh_dai_dien') }}" required autofocus>

                                @if ($errors->has('anh_dai_dien'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('anh_dai_dien') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Đăng tin
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


                <script type="text/javascript">
                $(document).ready(function() {
                  $('#side-menu').children('a').each(function() {
                          if($(this).hasClass('active'))
                    {
                      $(this).removeClass('active');
                    }
                  })
                  $('#dang-tin').addClass('active');
                });
                </script>
@endsection
