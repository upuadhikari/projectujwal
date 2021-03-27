<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Hamro Sath|| Online Counselling Webiste</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Hamro Sath" name="keywords">
        <meta content="Hamro Sath" name="description">

        <!-- Favicon -->
        <!-- <link href="img/favicon.ico" rel="icon"> -->

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Lato&family=Oswald:wght@200;300;400&display=swap" rel="stylesheet">
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{asset('assettss/css/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{asset('assetts/css/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <!-- <link href="css/style.css" rel="stylesheet"> -->
  <link href="{{asset('assetts/css/style.css')}}" rel="stylesheet">

    </head>

    <body>
       
        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">Hamro Sath</a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="service.html" class="nav-item nav-link">Service</a>
                        <a href="feature.html" class="nav-item nav-link">Program</a>
                        @if (Route::has('login'))
                                @auth
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                <button class="nav-item nav-link">Log out</button>
                                </form>
                                @else
                                    <a href="{{ route('login') }}" class="nav-item nav-link">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="nav-item nav-link">Register</a>
                                    @endif
                                @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('assetts/lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('assetts/lib/owlcarousel/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assetts/lib/waypoints/waypoints.min.js')}}"></script>
        <script src="{{asset('assetts/lib/counterup/counterup.min.js')}}"></script>
        
        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="{{asset('assetts/lib/js/main.js')}}"></script>
        @yield('content')