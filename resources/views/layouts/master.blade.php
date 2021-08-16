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


    <!-- Template Stylesheet -->
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <link href="{{asset('assetts/css/style.css')}}" rel="stylesheet">

</head>

<body>

    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg  navbar-dark">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Hamro Sath</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
                    <a href="{{ route('about') }}" class="nav-item nav-link">About</a>


                    @if (Route::has('login'))
                    @auth
                    <a href="{{route('service')}}" class="nav-item nav-link">Service</a>
                    <a href="{{route('blog')}}" class="nav-item nav-link">Blog</a>
                    <a href="{{ route('logout') }}" class="nav-item nav-link">Log Out</a>
                    <!-- <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button class="nav-item nav-link">Log out</button>
                    </form> -->
                    @else
                    <a href="{{route('program')}}" class="nav-item nav-link">Program</a>
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

    <!-- Carousel Start -->
    <div class="carousel">
        <div class="container-fluid">
            <div class="owl-carousel">
                <div class="carousel-item">
                    <div class="carousel-img">

                        <img src="{{asset('assetts/img/carousel-1.jpg')}}" alt="Image">
                    </div>
                    <div class="carousel-text">
                        <h1>Welcome to HamroSath</h1>
                        <p>
                            We are here to provide you the best Counselling Service with top rated experts.
                        </p>
                        <div class="carousel-btn">
                            <a class="btn" href="">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->



    @yield('content')
    <!-- <script>
if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script> -->