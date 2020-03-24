<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">-->
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">@yield('styles')
</head>

<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

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
                        @endif @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="container">
        <div class="row mt-5">
            @if(Auth::check())
            <div class="col-md-4">
                <ul class="list-group">

                    <li class="list-group-item"><a href="{{ route('home') }}">Home</a></li>
                    @if(Auth::user()->admin)
                    <li class="list-group-item"><a href="{{ route('users') }}">Users</a></li>
                    <li class="list-group-item"><a href="{{ route('user.create') }}">Create Users</a></li>
                    @endif
                    <li class="list-group-item"><a href="{{ route('categories.show') }}">Categories</a></li>
                    <li class="list-group-item"><a href="{{ route('category.create') }}">Create Category</a></li>
                    <li class="list-group-item"><a href="{{ route('posts') }}">All Posts</a></li>
                    <li class="list-group-item"><a href="{{ route('posts.trashed') }}">All Trashed Posts</a></li>
                    <li class="list-group-item"><a href="{{ route('post.create') }}">Create New Post</a></li>
                    <li class="list-group-item"><a href="{{ route('tags') }}">All Tags</a></li>
                    <li class="list-group-item"><a href="{{ route('tag.create') }}">Create New Tags</a></li>
                    <li class="list-group-item"><a href="{{ route('user.profile') }}">My Profile</a></li>
                    @if (Auth::user()->admin)
                    <li class="list-group-item"><a href="{{ route('setting.index') }}">settings</a></li> @endif
                </ul>
            </div>
            @endif
            <div class="col-md-8">
                @yield('content')
            </div>
        </div </div>

        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
        <script src="{{ asset('js/app.js') }}"></script> {{--
        <script src="{{ asset('Jquery/jquery.min.js') }}"></script> --}} {{--
        <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}
        <script src="{{ asset('js/toastr.min.js')}}"></script>

        @yield('scripts')
        <script>
            @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");

        @elseif(Session::has('info'))
            toastr.info("{{ Session::get('info') }}");

        @endif
        </script>
    </div>

</body>

</html>