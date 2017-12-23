<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/userProfile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/comments.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    @if(Auth::check())
                        <!-- admin navbar -->
                        @if(Auth::user()->role_id === 1)
                            <ul class="nav navbar-nav">
                                &nbsp;
                                <li><a href="{{ route('users.index') }}"><i class="fa fa-users" aria-hidden="true"></i> All Users</a></li>
                                <li><a href="{{ route('companies.index') }}"><i class="fa fa-building" aria-hidden="true"></i>  All Companies</a></li>
                                <li><a href="{{ route('projects.index')}}"><i class="fa fa-clipboard" aria-hidden="true"></i> All Projects</a></li>
                                <li><a href="{{ route('tasks.index')}}"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> All Tasks</a></li>
                                <li><a href="{{ route('roles.index')}}"><i class="fa fa-hand-paper-o" aria-hidden="true"></i></i> All Roles</a></li>
                            </ul>
                        @endif
                        
                        <!-- staff navbar -->
                        @if(Auth::user()->role_id === 2)
                            <ul class="nav navbar-nav">
                                &nbsp;
                                <li><a href="{{ route('companies.index') }}"><i class="fa fa-building" aria-hidden="true"></i>  All Companies</a></li>
                                <li><a href="{{ route('projects.index')}}"><i class="fa fa-clipboard" aria-hidden="true"></i> All Projects</a></li>
                                <li><a href="{{ route('tasks.index')}}"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> All Tasks</a></li>
                            </ul>
                        @endif
                        
                        <!-- user navbar -->
                        @if(Auth::user()->role_id === 3)
                            <ul class="nav navbar-nav">
                                &nbsp;
                                <li><a href="{{ route('companies.index') }}"><i class="fa fa-building" aria-hidden="true"></i>  All Companies</a></li>
                                <li><a href="{{ route('projects.index')}}"><i class="fa fa-clipboard" aria-hidden="true"></i> All Projects</a></li>
                                <li><a href="{{ route('tasks.index')}}"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> All Tasks</a></li>
                                
                            </ul>
                        @endif

                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else

                            @if(Auth::user()->role_id === 1)
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                        <i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;{{ Auth::user()->name}}{{' > admin'}} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('users.index') }}"><i class="fa fa-users" aria-hidden="true"></i> All Users</a></li>
                                        <li><a href="{{ route('companies.index') }}"><i class="fa fa-building" aria-hidden="true"></i>  All Companies</a></li>
                                        <li><a href="{{ route('projects.index')}}"><i class="fa fa-clipboard" aria-hidden="true"></i> All Projects</a></li>
                                        <li><a href="{{ route('tasks.index')}}"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> All Tasks</a></li>
                                        <li><a href="{{ route('roles.index')}}"><i class="fa fa-hand-paper-o" aria-hidden="true"></i></i> All Roles</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i> Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                       
                            @if(Auth::user()->role_id === 2)
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><i class="fa fa-user-times" aria-hidden="true"></i>&nbsp;{{ Auth::user()->name}}{{' > staff'}} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('companies.index') }}"><i class="fa fa-building" aria-hidden="true"></i>  All Companies</a></li>
                                        <li><a href="{{ route('projects.index')}}"><i class="fa fa-clipboard" aria-hidden="true"></i> All Projects</a></li>
                                        <li><a href="{{ route('tasks.index')}}"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> All Tasks</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i> Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                    
                            @if(Auth::user()->role_id === 3)
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;{{ Auth::user()->name}}{{' > user'}} <span class="caret"></span>
                                    </a>

                                     <ul class="dropdown-menu">
                                        <li><a href="{{ route('companies.index') }}"><i class="fa fa-building" aria-hidden="true"></i>  All Companies</a></li>
                                        <li><a href="{{ route('projects.index')}}"><i class="fa fa-clipboard" aria-hidden="true"></i> All Projects</a></li>
                                        <li><a href="{{ route('tasks.index')}}"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> All Tasks</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i> Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="container">
            <div class="row">
                @include('partials.errors')
                @include('partials.success')
            </div>
        </div>
           
        @yield('content')  
            
        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://use.fontawesome.com/0c20f24f3e.js"></script>
</body>
</html>
