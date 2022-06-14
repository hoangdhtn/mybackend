{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}

<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap material admin template">
    <meta name="author" content="">
    
    <title>Dashboard | Remark Material Admin Template</title>
    
    <link rel="apple-touch-icon" href="{{asset('public/backend/assets/images/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('public/backend/assets/images/favicon.ico')}}">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('public/backend/global/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/global/css/bootstrap-extend.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/assets/css/site.min.css')}}">
    
    <!-- Plugins -->
    <link rel="stylesheet" href="{{asset('public/backend/global/vendor/animsition/animsition.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/global/vendor/asscrollable/asScrollable.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/global/vendor/switchery/switchery.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/global/vendor/intro-js/introjs.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/global/vendor/slidepanel/slidePanel.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/global/vendor/jquery-mmenu/jquery-mmenu.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/global/vendor/flag-icon-css/flag-icon.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/global/vendor/waves/waves.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/chartist/chartist.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/jvectormap/jquery-jvectormap.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css')}}">
        <link rel="stylesheet" href="{{asset('public/backend/assets/examples/css/dashboard/v1.css')}}">
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('public/backend/global/fonts/material-design/material-design.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/global/fonts/brand-icons/brand-icons.min.css')}}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    
    <!--[if lt IE 9]>
    <script src="../../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    
    <!--[if lt IE 10]>
    <script src="../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../global/vendor/respond/respond.min.js"></script>
    <![endif]-->
    
    <!-- Scripts -->
    <script src="{{asset('public/backend/global/vendor/breakpoints/breakpoints.js')}}"></script>
    <script>
      Breakpoints();
    </script>
  </head>
  <body class="animsition site-navbar-small dashboard">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    @include('layouts.navigation')



    <!-- Page -->
    <div class="page">
      <div class="page-content container-fluid">

        {{-- @yeaild --}}
         @yield('content')
      </div>
    </div>
    <!-- End Page -->


    <!-- Footer -->
    <footer class="site-footer">
      <div class="site-footer-legal">© 2018 <a href="http://themeforest.net/item/remark-responsive-bootstrap-admin-template/11989202">Remark</a></div>
      <div class="site-footer-right">
        Crafted with <i class="red-600 icon md-favorite"></i> by <a href="https://themeforest.net/user/creation-studio">Creation Studio</a>
      </div>
    </footer>
    <!-- Core  -->
    <script src="{{asset('public/backend/global/vendor/babel-external-helpers/babel-external-helpers.js')}}"></script>
    <script src="{{asset('public/backend/global/vendor/jquery/jquery.js')}}"></script>
    <script src="{{asset('public/backend/global/vendor/popper-js/umd/popper.min.js')}}"></script>
    <script src="{{asset('public/backend/global/vendor/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('public/backend/global/vendor/animsition/animsition.js')}}"></script>
    <script src="{{asset('public/backend/global/vendor/mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{asset('public/backend/global/vendor/asscrollbar/jquery-asScrollbar.js')}}"></script>
    <script src="{{asset('public/backend/global/vendor/asscrollable/jquery-asScrollable.js')}}"></script>
    <script src="{{asset('public/backend/global/vendor/waves/waves.js')}}"></script>
    
    <!-- Plugins -->
    <script src="{{asset('public/backend/global/vendor/jquery-mmenu/jquery.mmenu.min.all.js')}}"></script>
    <script src="{{asset('public/backend/global/vendor/switchery/switchery.js')}}"></script>
    <script src="{{asset('public/backend/global/vendor/intro-js/intro.js')}}"></script>
    <script src="{{asset('public/backend/global/vendor/screenfull/screenfull.js')}}"></script>
    <script src="{{asset('public/backend/global/vendor/slidepanel/jquery-slidePanel.js')}}"></script>
        <script src="{{asset('public/backend/global/vendor/jvectormap/jquery-jvectormap.min.js')}}"></script>
        <script src="{{asset('public/backend/global/vendor/jvectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>
        <script src="{{asset('public/backend/global/vendor/matchheight/jquery.matchHeight-min.js')}}"></script>
        <script src="{{asset('public/backend/global/vendor/peity/jquery.peity.min.js')}}"></script>
        <!-- Datatables -->
        <script src="{{asset('public/backend/global/vendor/datatables.net/jquery.dataTables.js')}}"></script>
        <script src="{{asset('public/backend/global/vendor/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
        <script src="{{asset('public/backend/global/vendor/datatables.net-fixedheader/dataTables.fixedHeader.js')}}"></script>
        <script src="{{asset('public/backend/global/vendor/datatables.net-fixedcolumns/dataTables.fixedColumns.js')}}"></script>
        <script src="{{asset('public/backend/global/vendor/datatables.net-rowgroup/dataTables.rowGroup.js')}}"></script>
        <script src="{{asset('public/backend/global/vendor/datatables.net-scroller/dataTables.scroller.js')}}"></script>
        <script src="{{asset('public/backend/global/vendor/datatables.net-responsive/dataTables.responsive.js')}}"></script>
        <script src="{{asset('public/backend/global/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.js')}}"></script>
        <script src="{{asset('public/backend/global/vendor/datatables.net-buttons/dataTables.buttons.js')}}"></script>
        <script src="{{asset('public/backend/global/vendor/datatables.net-buttons/buttons.html5.js')}}"></script>
        <script src="{{asset('public/backend/global/vendor/datatables.net-buttons/buttons.flash.js')}}"></script>
        <script src="{{asset('public/backend/global/vendor/datatables.net-buttons/buttons.print.js')}}"></script>
        <script src="{{asset('public/backend/global/vendor/datatables.net-buttons/buttons.colVis.js')}}"></script>
        <script src="{{asset('public/backend/global/vendor/datatables.net-buttons-bs4/buttons.bootstrap4.js')}}"></script>
        <script src="{{asset('public/backend/global/vendor/bootbox/bootbox.js')}}"></script>
    
    <!-- Scripts -->
    <script src="{{asset('public/backend/global/js/Component.js')}}"></script>
    <script src="{{asset('public/backend/global/js/Plugin.js')}}"></script>
    <script src="{{asset('public/backend/global/js/Base.js')}}"></script>
    <script src="{{asset('public/backend/global/js/Config.js')}}"></script>
    <script src="{{asset('public/backend/global/js/Config.js')}}"></script>


    
    <script src="{{asset('public/backend/assets/js/Section/Menubar.js')}}"></script>
    <script src="{{asset('public/backend/assets/js/Section/Sidebar.js')}}"></script>
    <script src="{{asset('public/backend/assets/js/Section/PageAside.js')}}"></script>
    <script src="{{asset('public/backend/assets/js/Section/GridMenu.js')}}"></script>
    
    <!-- Config -->
    <script src="{{asset('public/backend/global/js/config/colors.js')}}"></script>
    <script src="{{asset('public/backend/assets/js/config/tour.js')}}"></script>
    <script>Config.set('assets', '{{asset('public/backend/assets')}}');</script>
    
    <!-- Page -->
    <script src="{{asset('public/backend/assets/js/Site.js')}}"></script>
    <script src="{{asset('public/backend/global/js/Plugin/asscrollable.js')}}"></script>
    <script src="{{asset('public/backend/global/js/Plugin/slidepanel.js')}}"></script>
    <script src="{{asset('public/backend/global/js/Plugin/switchery.js')}}"></script>
        <script src="{{asset('public/backend/global/js/Plugin/matchheight.js')}}"></script>
        <script src="{{asset('public/backend/global/js/Plugin/jvectormap.js')}}"></script>
        <script src="{{asset('public/backend/global/js/Plugin/peity.js')}}"></script>
        <script src="{{asset('public/backend/global/js/Plugin/datatables.js')}}"></script>
    
        <script src="{{asset('public/backend/assets/examples/js/dashboard/v1.js')}}"></script>
    
  </body>
</html>
