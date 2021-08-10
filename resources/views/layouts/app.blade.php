<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/sticky-footer-navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
    @stack('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    SDIT Persis
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                            @if(Auth::guard('teacher')->check())
                                <li class="nav-item">
                                    <a class="nav-link" href="/my-schedule?tab=jadwal"><i class="fa fa-calendar" aria-hidden="true"></i> Jadwal Mengajar</a>
                                </li>
                                @if(Auth::guard('teacher')->user()->studentClass!=null)
                                <li class="nav-item">
                                    <a class="nav-link" href="/home-room-teacher?semester=1"><i class="fa fa-calendar" aria-hidden="true"></i> Wali Kelas</a>
                                </li>
                                @endif

                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fa fa-user-circle" aria-hidden="true"></i> {{ Auth::guard('teacher')->user()->name }}
                                        </a>
        
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="/profile">Profile</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
        
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                            @elseif(Auth::guard('student')->check())
                                <li class="nav-item">
                                    <a class="nav-link" href="/student-dashboard?tab=jadwal"><i class="fa fa-calendar" aria-hidden="true"></i> Jadwal Pelajaran</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/student-dashboard?tab=nilai"><i class="fa fa-calendar" aria-hidden="true"></i> Lihat Nilai</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="/material"><i class="fa fa-book" aria-hidden="true"></i> My Material</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/task"><i class="fa fa-tasks" aria-hidden="true"></i> My Task</a>
                                </li> --}}
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fa fa-user-circle" aria-hidden="true"></i> {{ Auth::guard('student')->user()->name }}
                                        </a>
        
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="/profile">Profile</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
        
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>        
                            @elseif(Auth::check())
                                <li class="nav-item">
                                    <a class="nav-link" href="/class"><i class="fa fa-building" aria-hidden="true"></i> @lang('menu.manage_class')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/student"><i class="fa fa-graduation-cap" aria-hidden="true"></i> @lang('menu.manage_student')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/teacher"><i class="fa fa-users" aria-hidden="true"></i> @lang('menu.manage_teacher')</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fa fa-building" aria-hidden="true"></i> Master Data
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/course">@lang('menu.manage_course')</a>
                                        <a class="dropdown-item" href="/room">@lang('menu.manage_room')</a>
                                        <a class="dropdown-item" href="/academic">@lang('menu.manage_academic_year')</a>
                                    </div>
            
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/manage-pmb"><i class="fa fa-users" aria-hidden="true"></i> PSB</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/payment"><i class="fa fa-money" aria-hidden="true"></i> @lang('menu.manage_payment')</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fa fa-user-circle" aria-hidden="true"></i> Hello : {{ Auth::user()->name }}
                                    </a>
    
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/profile">Profile</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
            
                                </li>
                                    
                            @else
                                @if (Route::has('login'))
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Admin Login</a>
                                </li> --}}
                                @endif

                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="/teacher-login">Teacher Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/student-login">Student Login</a>
                                </li> --}}
                                
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif    
                           
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="footer">
        <div class="container text-center">
          <span class="text-muted ">Simple School Class System | Build With love From Bandung, Indonesia.</span>
        </div>
      </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    @stack('js')
</body>
</html>
