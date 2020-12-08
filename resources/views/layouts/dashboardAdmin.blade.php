<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Kokeru | Dashboard Admin</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="../assets2/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{URL::asset('assets2/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::asset('assets2/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{URL::asset('assets2/css/argon.css?v=1.2.0')}}" type="text/css">
    <!-- Styles -->
  </head>
    <body>
          <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
            <div class="scrollbar-inner">
              <!-- Brand -->
              <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                  <img src="{{ asset('img/logo.png') }}" class="navbar-brand-img" alt="..." width="150px" height="41px">
                </a>
              </div>
              <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                  <!-- Nav items -->
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('/admin') }}">
                        <i class="ni ni-tv-2 text-primary"></i>
                        <span class="nav-link-text">Dashboard</span>
                      </a>
                    </li>
                    {{-- <li class="nav-item">
                      <a class="nav-link" href="icons.html">
                        <i class="ni ni-single-02 text-yellow"></i>
                        <span class="nav-link-text">Janitor</span>
                      </a>
                    </li> --}}
                    <li class="nav-item">
                      <a class="nav-link" href="{{ url('/admin/room') }}">
                        <i class="ni ni-pin-3 text-primary"></i>
                        <span class="nav-link-text">Ruangan</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="">
                        <i class="ni ni-chart-bar-32 text-info"></i>
                        <span class="nav-link-text">Laporan</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">
                        <i class="ni ni-single-02 text-pink"></i>
                        <span class="nav-link-text">Daftar</span>
                      </a>
                    </li>
                  </ul>
                  <hr class="my-3">
                        
                  <!-- Divider -->
                  
                  <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                      <a class="nav-link" href="">
                        <i class="ni ni-spaceship text-red"></i>
                        <span class="nav-link-text">Reset Status</span>
                      </a>
                    </li>
                    @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                            
                             <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="ni ni-button-power"></i>{{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>                                                        
                         </li>
                    @endguest
                    </ul>
                 </div>
                </div>
              </div>
            </div>
          </nav>
          <div class="main-content" id="panel">
            <div class="header pb-7" style="background-image: linear-gradient(to right, #28c29a , #4f7dcc)" >
              <div class="container-fluid">
                <div class="header-body">
                  <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-5 text-right">
                    </div>
                  </div>
                </div>
              </div>
            </div>
        @yield('content')
          </div>
