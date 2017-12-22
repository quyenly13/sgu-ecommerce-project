@extends('customer.layouts.main')

@section('title', 'Trang chủ')

@section('content')
<main id="mainContent" class="main-content">
    <div class="page-container ptb-10">
        <div class="container">
          @if(Session::has('success'))
            <div class="alert alert-success"> {{Session::get('success') }}</div>
          @elseif(Session::has('error'))
            <div class="alert alert-error"> {{Session::get('error') }}</div>
          @endif
            <div class="section deals-header-area">
                <div class="row row-tb-20">
                    @include('customer.components.menu_categories')

                <div class="col-xs-12 col-md-8 col-lg-9" id="productS">
                   @include('customer.layouts.product-list')
                </div>
            </div>

        </div>
    </div>
    </div>
    </main>
@endsection
