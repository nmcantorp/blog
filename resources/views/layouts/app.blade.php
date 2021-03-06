<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title','Default') | Blog </title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" >
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}" >
    <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/dist/ui/trumbowyg.css') }}" >
    <link rel="stylesheet" type="text/css" href=" {{ asset('css/master.css') }} " >
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li><a href=" {{ route('admin.users.index') }} ">User</a></li>
                        <li><a href="{{ route('admin.categories.index') }}">Categorias</a></li>
                        <li><a href="{{ route('admin.tags.index') }}">Tags</a></li>
                        <li><a href="{{ route('admin.articles.index') }}">Articulos</a></li>
                        <li><a href="{{ route('admin.images.index') }}">Imagenes</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">                                
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @include('flash::message')
		@include('admin/template/partials/errors')
        @yield('content')
    </div>
    <!-- JavaScripts -->
    <script src="{{ asset('plugins/jquery/js/jquery-2.2.3.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('plugins/trumbowyg/dist/trumbowyg.js') }}" type="text/javascript" charset="utf-8"></script>   

    @yield('js')
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
