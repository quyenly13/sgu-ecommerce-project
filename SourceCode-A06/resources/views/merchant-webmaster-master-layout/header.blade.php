
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></a>
        <div class="top-left-part">
            <a class="logo" href="{{ route('home') }}">
                <b>
                    <img src="{{ asset('webmaster-merchant/images/logo-text.png') }}" style="margin-left: 10px" alt="home" />
                </b>
                <!--  -->
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-left m-l-20 hidden-xs">
            <li>

            </li>
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li>
            @yield('loggin-user')
            </li>
        </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>
