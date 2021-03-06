<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/dashboard.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ mix('js/dashboard.js') }}" defer></script>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed font-sans antialiased">
        <div class="wrapper">

            @livewire('navigation-menu')

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-warning elevation-2">
                <!-- Brand Logo -->
                <a href="/" class="brand-link">
                    <x-jet-application-mark width="36" class="brand-image img-circle elevation-1" style="opacity: .8"></x-jet-application-mark>
                    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div class="image">
                                <img src="{{ Auth::user()->profile_photo_url }}" class="img-circle elevation-1" alt="{{ Auth::user()->name }}">
                            </div>
                        @endif
                        <div class="info">
                            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                            <!-- Dashboard -->
                            <li class="m-2 text-left">
                                <a href="{{ route('dashboard') }}" class="btn btn-dark text-dark text-left" style="width: 100%;">
                                    <i class="nav-icon fas fa-tachometer-alt text-primary ml-2"></i>
                                    <span class="pl-4 text-light">
                                    {{__('Dashboard')}}
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item has-treeview">
                                <a class="nav-link bg-warning">
                                    <i class="nav-icon fas fa-th-large"></i>
                                    <p class="pl-4">
                                        Management
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview pb-5">
                                    <li class="m-2 text-left">
                                        <a href="{{ route('add-new-student') }}" class="btn btn-dark text-dark text-left" style="width: 100%;">
                                            <i class="nav-icon fa fa-user-plus text-success ml-2"></i>
                                            <span class="pl-4 text-light">
                                            {{__('Add New')}}
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-2 text-left">
                                        <a href="{{ route('students') }}" class="btn btn-dark text-dark text-left" style="width: 100%;">
                                            <i class="nav-icon fas fa-cogs text-warning ml-2"></i>
                                            <span class="pl-4 text-light">
                                            {{__('Students')}}
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col">
                                <h1>{{ $header }}</h1>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                {{ $slot }}
                            </div>

                            @if (isset($aside))
                                <div class="col-lg-3">
                                    {{ $aside }}
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b><a href="https://jetstream.laravel.com">Jetstream</a></b>
                </div>
                <strong>Powered by</strong> <a href="https://adminlte.io">AdminLTE</a>
            </footer>
        </div>

        @stack('modals')
        @livewireScripts
        @stack('scripts')
    </body>
</html>
