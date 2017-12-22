<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('webmaster-merchant/images/favicon.png') }}">
    <title>ToyWorld - @yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('webmaster-merchant/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{ asset('webmaster-merchant/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    <!-- toast CSS -->

    <!-- morris CSS -->
    <link href="{{ asset('webmaster-merchant/bower_components/morrisjs/morris.css') }}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{ asset('webmaster-merchant/css/animate.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('webmaster-merchant/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('webmaster-merchant/css/jquery_ui.css') }}" rel="stylesheet">
      <link href="{{ asset('webmaster-merchant/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('webmaster-merchant/css/colors/green-dark.css') }}" id="theme" rel="stylesheet">
    <link href="{{ asset('webmaster-merchant/css/datatable.css') }}"rel="stylesheet">
    <!-- jQuery -->
    <script src="{{ asset('webmaster-merchant/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('webmaster-merchant/js/jquery_ui.js') }}"></script>
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('webmaster-merchant/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{ asset('webmaster-merchant/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{ asset('webmaster-merchant/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('webmaster-merchant/js/waves.js') }}"></script>
    <!--Counter js -->
    <script src="{{ asset('webmaster-merchant/bower_components/waypoints/lib/jquery.waypoints.js') }}"></script>

    <!--Morris JavaScript -->
    <script src="{{ asset('webmaster-merchant/bower_components/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('webmaster-merchant/bower_components/morrisjs/morris.js') }}"></script>

    <!-- Custom Theme JavaScript -->



    <script src="{{ asset('webmaster-merchant/js/datatable.js') }}"></script>
    <script src="{{ asset('webmaster-merchant/js/moment.min.js') }}"></script>
    <script src="{{ asset('webmaster-merchant/js/money.js') }}"></script>
    <script src="{{ asset('webmaster-merchant/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/merchant/script.js') }}"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        // $.toast({
        //     heading: 'Chào mừng đến với ',
        //     text: 'Use the predefined ones, or specify a custom position object.',
        //     position: 'top-right',
        //     loaderBg: '#ff6849',
        //     icon: 'info',
        //     hideAfter: 3500,
        //     stack: 6
        // });
        $('#tableListBuy').DataTable({
            "order": [[ 5, 'asc' ]],
             "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
            }
        });
        $('#myTable').DataTable({
            "order": [[ 3, 'asc' ]],
             "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
            }
        });

        $('#myTable_deal').DataTable({
            "order": [[ 6, 'desc' ]],
             "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
            }
        });
        $('#bangchi').DataTable({
            "order": [],
             "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
            }
        });
        $('#bangthu').DataTable({
            "order": [],
             "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
            }
        });

    });
    </script>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        @include('merchant-webmaster-master-layout.header')
        @include('merchant-webmaster-master-layout.menubar')
        @include('merchant-webmaster-master-layout.content')
    </div>
