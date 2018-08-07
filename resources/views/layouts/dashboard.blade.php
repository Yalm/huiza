<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/icons/favicon.png') }}">
    <title>Comercial Huiza - Compra Online productos con grandes ofertas</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/lib/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Notifications-->
    <link href="{{ asset('vendor/messenger/messenger.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/messenger/messenger-theme-flat.css') }}" rel="stylesheet">
     <link href="{{ asset('css/lib/sweetalert/sweetalert.css') }}" rel="stylesheet">

    @yield('mycssfile')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('admin') }}">
                        <!-- Logo icon -->
                        <b class="text-white f-s-30"><i class="fa fa-bicycle" aria-hidden="true"></i></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span><img width ="92" height="33" src="{{ asset('images/icons/logo-01.png') }}" alt="homepage" class="dark-logo"/></span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('images/avatar.png') }}" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn dropdown_ch">
                                <ul class="dropdown-user">
                                    <li><a href="{{ url('admin/profile') }}"><i class="ti-user"></i> Perfil</a></li>
                                    <li><a href="{{ route('logout') }}"
								                    onclick="event.preventDefault();
													document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Salir</a>
                                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                        </form>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                    <li class="nav-devider"></li>
                    <li class="nav-label"></li>
                    <li><a href="{{ url('admin/login') }}" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Inicio</span></a>
                    </li>
                    <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-archive"></i><span class="hide-menu">Productos</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ url('admin/product') }}">Todos los productos </a></li>
                            <li><a href="{{ url('admin/product/create') }}">Nuevo Producto </a></li>
                            <li><a href="{{ url('admin/category') }}">Categoría </a></li>
                        </ul>
                    </li>
                    <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-truck"></i><span class="hide-menu">Pedidos</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ url('admin/order') }}">Todos los pedidos </a></li>
                            <li><a href="{{ url('admin/state') }}">Estados </a></li>
                        </ul>
                    </li>

                    <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Usuarios</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="index-2.html">Todos los usuario </a></li>
                            <li><a href="index1.html">Añadir nuevo </a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('admin/customer') }}" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Clientes</span></a>
                    </li>
                    <li><a href="{{ url('admin/report') }}" aria-expanded="false"><i class="fa fa-file"></i><span class="hide-menu">Reportes</span></a>
                    </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            @yield('content')
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="{{ asset('js/lib/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('js/lib/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('js/lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset('js/lib/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <!-- Notifications-->
    <script src="{{ asset('vendor/messenger/messenger.min.js') }}"></script>
    <script src="{{ asset('vendor/messenger/messenger-theme-flat.js') }}"></script>

    <script src="{{ asset('js/lib/sweetalert/sweetalert.min.js') }}"></script>
    
    <!--Custom JavaScript -->
    <script src="{{ asset('js/custom.min.js') }}"></script>


    @yield('myjsfile')

</body>


</html>