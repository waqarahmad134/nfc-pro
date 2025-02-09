<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{env('APP_TITLE')}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="{{asset('public/assets/images/logo.webp')}}" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/vendor/dropify/css/dropify.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/vendor/summernote/dist/summernote.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/color_skins.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<style>
    .theme-orange .navbar-fixed-top {
        background: #00072D;
    }

    .dropdown-item {
        padding: 0px;
    }

    .dropdown-menu>li>a,
    .dropdown-menu>li>a:hover,
    .dropdown-menu>li>a:focus {
        padding: 0.25rem 1.5rem;
    }

    .dropdown-menu>li>a {
        width: 100%;
        display: block;
    }

    .dropdown-item.active,
    .dropdown-item:active {
        color: #fff;
        text-decoration: none;
        background-color: transparent !important;
    }

    .theme-orange #left-sidebar {
        background: #000000 !important;
    }

    .theme-orange .page-loader-wrapper {
        background: #fc3a52 !important;
    }

    .theme-orange .navbar-fixed-top {
        background: #000000 !important;
    }
</style>


<body class="theme-orange">
    <!-- Page Loader -->
    <div class="page-loader-wrapper" style="background : {{ env('THEME_PRIMARY_COLO', '#000000') }} !important;">
        <div class="loader">
            <div class="m-t-30">
                <img class="img-fluid rounded" src="{{asset('public/assets/images/logo.webp')}}" alt="{{env('APP_TITLE')}} Logo" class="img-fluid" width="200_skins">
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <div id="wrapper">
        <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-left">
                    <div class="navbar-btn">
                        <a href="{{route('home')}}"><img src="{{asset('public/assets/images/logo.webp')}}" alt="{{env('APP_TITLE')}} Logo" class="img-fluid logo"></a>
                        <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                    </div>
                    <a href="javascript:void(0);" class="icon-menu btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
                </div>
                <div class="navbar-right">
                    <div id="navbar-menu">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('logout') }}" class="icon-menu"><i class="icon-power"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div id="left-sidebar" class="sidebar">
            <div class="sidebar-scroll">
                <div class="user-account">
                    <div>
                        <img class="img-fluid" src="{{asset('public/assets/images/logo.webp')}}" alt="{{env('APP_TITLE')}}">
                    </div>
                </div>
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu">
                        @if(session()->get('role') == 'superadmin')
                        <li class="@if(\Request::route()->getName() == 'home') active  @endif">
                            <a href="{{route('home')}}"><i class="icon-home"></i><span>Dashboard</span></a>
                        </li>
                        <li class="@if(\Request::route()->getName() == 'list_sub_admin') active  @endif">
                            <a href="{{route('list_sub_admin')}}"><i class="fa fa-users"></i><span>List Sub Admins</span></a>
                        </li>
                        <li class="@if(\Request::route()->getName() == 'add_sub_admin') active  @endif">
                            <a href="{{route('add_sub_admin')}}"><i class="fa fa-user"></i><span>Add Sub Admin</span></a>
                        </li>
                        @endif
                        @if(session()->get('role') == 'subadmin')
                        <li class="@if(\Request::route()->getName() == 'employee_users') active  @endif">
                            <a href="{{route('employee_users')}}"><i class="fa fa-users" aria-hidden="true"></i><span>List Users</span></a>
                        </li>
                        <li class="@if(\Request::route()->getName() == 'csv') active  @endif">
                            <a href="{{route('csv')}}"><i class="fa fa-user"></i><span>Add CSV</span></a>
                        </li>
                        <li class="@if(\Request::route()->getName() == 'add_user') active  @endif">
                            <a href="{{route('add_user')}}"><i class="fa fa-user"></i><span>Add New User</span></a>
                        </li>
                        @endif
                        <li class="@if(\Request::route()->getName() == 'change-my-password') active  @endif">
                            <a href="{{ route('change-my-password') }}"><i class="fa fa-cog"></i><span>Change Password</span></a>
                        </li>
                        <li class="@if(\Request::route()->getName() == 'editUser') active  @endif">
                            <a href="{{ route('editUser',['id' => base64_encode(session()->get("user_data")->id)]) }}"><i class="fa fa-edit"></i><span>Update Profile</span></a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i><span>Logout</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        @yield('content')

    </div>

    <script>
        @if(Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.message("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{!! session('error') !!}");
        @endif

        @if(Session::has('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.warning("{{ session('warning') }}");
        @endif
    </script>
    <!-- Javascript -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- <script src="{{asset('public/assets/bundles/libscripts.bundle.js')}}"></script> -->
    <script src="{{asset('public/assets/bundles/vendorscripts.bundle.js')}}"></script>
    <script src="{{asset('public/assets/bundles/mainscripts.bundle.js')}}"></script>
    <script src="{{asset('public/assets/js/index.js')}}"></script>

    <!--Data table-->
    <script src="{{asset('public/assets/bundles/datatablescripts.bundle.js')}}"></script>
    <script src="{{asset('public/assets/js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="{{asset('public/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('public/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/assets/vendor/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
    <!--Summer Notes -->
    <script src="{{asset('public/assets/vendor/summernote/dist/summernote.js')}}"></script>

    <!--Dropify Image Uploader-->
    <script src="{{asset('public/assets/vendor/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('public/assets/js/pages/forms/dropify.js')}}"></script>

    <!--Date Picker -->
    <script src="{{asset('public/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

</body>

</html>