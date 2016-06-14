<div class="sidebar sidebar-left sidebar-visible-md-up si-si-3 sidebar-dark bg-midnightblue" id="sidebar"
     data-scrollable>

    <!-- Brand -->
    <a href="#" class="sidebar-brand">Blogger</a>

    <!-- Menu -->
    @if(Auth::check() && auth()->user()->isAdmin())
        <ul class="sidebar-menu sm-active-button-bg">
            <li class="sidebar-menu-item">
                <a class="sidebar-menu-button" href="#">
                    <i class="material-icons md-18 m-r-1">dashboard</i>
                    dashboard
                </a>
            </li>
            {{--<li class="nav-item sidebar-menu-item ">--}}
            {{--<a href="#button" class="nav-link sidebar-menu-button">--}}
            {{--<i class="material-icons md-18 m-r-1">person_outline</i>--}}
            {{--{!! auth()->user()->name !!}--}}
            {{--</a>--}}
            {{--<ul class="sidebar-submenu">--}}
            {{--<li class="sidebar-menu-item">--}}
            {{--<a class="sidebar-menu-button" href="#">--}}
            {{--<i class="material-icons md-18 m-r-1">settings</i>--}}
            {{--notification settings--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            <li class="sidebar-menu-item">
                <a class="sidebar-menu-button" href="{!! route('get.upload') !!}">
                    <i class="material-icons md-18 m-r-1">person_outline</i>
                    upload File
                </a>
            </li>
            <li class="nav-item sidebar-menu-item">
                <a href="{!! route('datatables.get.files') !!}" class="nav-link sidebar-menu-button">
                    <i class="material-icons md-18 m-r-1">assignment_returned</i>
                    all Files
                </a>
            </li>
            <li class="nav-item sidebar-menu-item">
                <a href="{!! route('datatables.get.users') !!}" class="nav-link sidebar-menu-button">
                    <i class="material-icons md-18 m-r-1">supervisor_account</i>
                    all Users
                </a>
            </li>
            <li class="nav-item sidebar-menu-item">
                <a href="{!! route('datatables.get.downloads') !!}" class="nav-link sidebar-menu-button">
                    <i class="material-icons md-18 m-r-1">cloud_download</i>
                    downloads
                </a>
            </li>
        </ul>
        @endif
                <!-- // END Menu -->

</div>
