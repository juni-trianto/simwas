<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@700&family=Roboto&display=swap" rel="stylesheet">
  <style>
        h1, h2, h3, h4, h5, h6, b{
            font-family: Lora;
        }
        p, li, a{
            font-family: Roboto;
        }
    </style>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div id="app" >
        <nav class="navbar navbar-expand-md text-white  bg-danger shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="{{ url('/home') }}">
                <img src="https://simwas.pemalangkab.go.id/assets/images/logouser.png" alt="Logo" style="width: 20px;" >
                  <b> {{ config('app.name', 'Laravel') }}</b>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @guest
                    @else

                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                          <a class="nav-link   @if(Request::segment(1) == 'master' ) bg-warning rounded text-dark @else text-white @endif  " aria-current="page" href="{{ route('user') }}"> <i class="bi bi-gear-fill"></i> Master</a>
                        </li>
                    </ul>
                    @endif


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown ">
                                <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item " href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 bg-white">
            <div class="container-fluid">
             
                @yield('content')
            </div>
        </main>
        <footer class="bg-white">
            <hr>
            <small>
                <center>
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) | SIMWAS
                </center>
            </small>

        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session()->has('success'))
       <script>
          Swal.fire({
            title: 'Success!',
            text: "{{session('success')}}",
            icon: 'success',
            // confirmButtonText: 'Cool'
            })
       </script>
    @endif
    @if(session()->has('error'))
    <script>
          Swal.fire({
            title: 'Error!',
            text: "{{session('error')}}",
            icon: 'error',
            // confirmButtonText: 'ok'
            })
       </script>
    @endif



</body>
</html>
