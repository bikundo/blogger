<!DOCTYPE html>
<html class="bootstrap-layout">
<head>

    @include('includes/head')

</head>
<body id="vue-body" class="layout-container ls-top-navbar si-l3-md-up">
<input type="hidden" value="{!! csrf_token() !!}" id="laraToken">

<!-- Navbar -->
<nav class="navbar navbar-light bg-white navbar-full navbar-fixed-top ls-left-sidebar">

    <!-- Navbar toggle -->
    <button class="navbar-toggler hidden-md-up pull-xs-right" type="button" data-toggle="collapse"
            data-target="#navbar"><span class="material-icons">menu</span></button>

    <!-- Sidebar toggle -->
    <button class="navbar-toggler pull-xs-left" type="button" data-toggle="sidebar" data-target="#sidebar"><span
                class="material-icons">menu</span></button>

    <!-- Brand -->
    <span class="navbar-brand">Blogger</span>

    <!-- Collapse -->
    <div class="collapse navbar-toggleable-xs" id="navbar">
        <ul class="nav navbar-nav pull-md-right">
            <li class="nav-item">
                @if(Auth::check())
                    <a class="nav-link" href="{{ url('/logout') }}">
                        Logout
                        <i class="material-icons md-18 m-l-0">exit_to_app</i>
                    </a>
                @else
                    <a class="nav-link" href="{!! url('/login') !!}">
                        Login
                        <i class="material-icons md-18 m-l-0">exit_to_app</i>
                    </a>
                @endif
            </li>
        </ul>
    </div>
    <!-- // END Collapse -->
</nav>
<!-- // END Navbar -->

<!-- Sidebar -->
@include('includes.sidebar')
        <!-- // END Sidebar -->

<!-- Content -->
<div class="layout-content" data-scrollable>
    <div class="container-fluid">

        @yield('breadcrumb')

        @yield('content')

    </div>
</div>
<!-- // END Content -->

<!-- App JS (includes vendor assets) -->
@include ('footer')
@yield('footer-content')
<script src="{{ asset('/js/all.js') }}"></script>
<script>
    @if(!Auth::check())
    $(document).ready(function () {
        setTimeout(function () {
            $(".navbar-toggler").click();
        }, 200);
    });

    @endif
</script>
@include('includes.notifications')
@yield('footer-scripts')
</body>
</html>
