<!DOCTYPE html>
<html>
<head>
    <title>@yield('page_title') Lifestyle</title>
    @section('meta')
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    @show

    @section('stylesheets')
        <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset('vendors/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
    @show

    @section('js_head')
        <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    @show
</head>
<body>
    <div class="banner-body">
        <div class="container">

            @section('header')
                <div class="header">
                    <div class="header-nav">
                        <nav class="navbar navbar-default">

                            <div class="navbar-header">
                                <a class="navbar-brand" href=" {{ route('site.posts') }}"><span>L</span>ifestyle</a>
                            </div>

                            <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">

                                <div class="sign-in">
                                    <ul>
                                        <li><a href="{{ route('admin.posts') }}">Sign In </a></li>
                                    </ul>
                                </div>
                            </div><!-- /.navbar-collapse -->

                        </nav>
                    </div>
                </div>
            @show

            @yield('content')
        </div>
    </div>
@section('javascripts')
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
@show
</body>
</html>