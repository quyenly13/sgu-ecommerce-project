<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Toys World - @yield('title')</title>
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('webmaster-merchant/images/favicon.png') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,400,700" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('assets/customer/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/customer/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/customer/css/linearicons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/customer/css/base.css') }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link href="{{ asset('assets/customer/css/jquery-ui.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/customer/css/star-rating-svg.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/customer/css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
       
        

<script>




</script>

    </head>
    <body>
        @include('customer/components/header')
        @yield('content')

        @include('customer/components/footer')

        <script src="{{ asset('assets/customer/js/script.js') }}"></script>
        <script src="{{ asset('assets/customer/js/jquery-3.2.1.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{ asset('assets/customer/js/amazeui.js') }}"></script>
        <script src="{{ asset('assets/customer/js/jquery.star-rating-svg.js') }}"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

        <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
        <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
        @yield('script')
    </body>
</html>
