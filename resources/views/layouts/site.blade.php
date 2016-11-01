<!DOCTYPE html>
<html>
<head>
    <title>Lifestyle</title>
    @section('meta')
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    @show

    @section('stylesheets')
        <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
                                <a class="navbar-brand" href="#"><span>L</span>ifestyle</a>
                            </div>

                        </nav>
                    </div>
                </div>
            @show

            <div class="blog">
                @section('content')
                    <div class="blog-left">
                        @yield('blog-left')
                    </div>
                    <div class="blog-right">
                        @yield('blog-right')
                    </div>
                    <div class="clearfix"></div>
                @show
            </div>
        </div>
    </div>
@section('javascripts')
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
@show
</body>
</html>