<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Insta</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c0fd15ce0b.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/uikit-rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('css/uikit-rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/uikit.css') }}" rel="stylesheet">
    <link href="{{ asset('css/uikit.min.css') }}" rel="stylesheet">


</head>
<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm px">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <img src="https://clipart.info/images/ccovers/1516920570instagram-png-icon.png" alt="" style="width: 40px"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Instagram_logo.svg/1200px-Instagram_logo.svg.png" style="width: 90px" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    @auth
                    <form action="/search" enctype= "multipart/form-data"  method="get" style="margin-left: 300px;">
                        <form class="uk-search uk-search-default">
                            <div class=" d-flex ">
                            <input name="search" class="uk-search-input" type="search" placeholder="Search Users...">
                            <button class="uk-button uk-button-default" type="submit" style="border: none;"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </form>
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            {{-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li> --}}
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            @yield('content')


        @auth
            <div class="adminActions">
                <input type="checkbox" name="adminToggle" class="adminToggle" />
                <a class="adminButton" href="#!"><i class="fa fa-cog"></i></a>
                <div class="adminButtons">
                    <a href="{{ url('/') }}" title="Home"><i class="fas fa-home" style="color: magenta; font-size: x-large;"></i></a>
                    <a href="{{ url('/users') }}" title="Find friends"><i class="fas fa-user-plus" style="color: white; font-size: x-large;"></i></a>
                    <a href="/post/create" title="Add Post"><i class="fas fa-plus" style="color: turquoise; font-size: x-large;"></i></a>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" title="Logout">
                            {{-- {{ __('Logout') }} --}}
                        <i class="fas fa-sign-out-alt" style="color: blue; font-size: x-large;"></i>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </div>
            </div>
            <a href="#" uk-totop uk-scroll style="float: right; width:40px; color:blue; position:"></a>
            @endauth
        </main>
    </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/uikit-icons.js') }}" defer></script>
        <script src="{{ asset('js/uikit-icons.min.js') }}" defer></script>
        <script src="{{ asset('js/uikit.js') }}" defer></script>
        <script src="{{ asset('js/uikit.min.js') }}" defer></script>
        <script src="{{ asset('js/custom.js') }}" defer></script>

</body>
</html>
