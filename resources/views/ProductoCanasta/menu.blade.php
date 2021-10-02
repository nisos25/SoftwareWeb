<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>#CaucaAgroSostenible</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script>
        var scroll = new SmoothScroll('a[href*="#"]');
    </script>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}"><img src="img/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Canasta agrícola</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#asociaciones">Emprendiminetos y asociaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tienda') }}">Tienda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#gente">Inversionistas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#evento">Eventos</a>
                </li>
            </ul>
            <ul class="navbar-nav">
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
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('admin.index.create')
                                <a class="dropdown-item" href="{{ route('adminHome') }}">
                                    {{ __('Admin') }}
                                </a>
                            @endcan
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<div id="slides" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/background.jpg">
            <div class="carousel-caption">
                <h2 class="display-2">Visita nuestra tienda virtual</h2>
                <a href="{{ route('tienda') }}" class="btn btn-outline-light btn-lg" role="button" aria-pressed="true">Ir
                    a la tienda</a>
                <a href="#" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Agrooferta</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/background2.jpg">
        </div>
        <div class="carousel-item">
            <img src="img/background3.jpg">
        </div>
    </div>
</div>

<section id="jumbotron">
    <div class="container-fluid">
        <div class="row jumbotron">
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                <p class="lead">Mira todas nuestras ofertas
                </p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                <a href="#">
                    <button type="button" class="btn btn-outline-secondary
					btn-lg">OFERTAS
                    </button>
                </a>
            </div>
        </div>
    </div>
</section>


<div class="container-fluid padding" id="asociaciones">
    <div class="row padding">
        <div class="col-md-12 col-lg-6">
            <h2>Emprendimientos y asociaciones</h2>
            <p>Uno de los objetivos de cauca agrosostenible es promover los emprendimientos de nuestro departamento
                por lo cual decimos darle todo un espacio para que cada persona se tome el trabajo de conocerlas mas a
                fondo
            </p>
            <a href="{{ route('emprendimiento') }}" class="btn btn-primary">Más</a>
        </div>
        <div class="col-lg-4">
            <img id="imageTesto" src="img/emprendedores.jpg" class="img-fluid">
        </div>
    </div>
</div>

<hr class="my-4">

<figure>
    <div class="fixed-wrap">
        <div id="fixed"></div>
    </div>
</figure>


<section id="gente">
    <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="display-4">Inversionistas </h1>
            </div>
            <hr>
        </div>
    </div>
</section>

<div class="container-fluid padding">
    <div class="row padding">
        @foreach($Inversionistas as $inversionista)
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="{{asset('storage'.'/'.$inversionista->Imagen)}}">
                    <div class="card-body">
                        <h4 class="card-title">{{$inversionista->Nombre}}</h4>
                        <p class="card-text">{{$inversionista->descripcion}}</p>
                        <a href="{{route('inversionistaTienda')}}" class="btn btn-outline-secondary">Ver mas información</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<hr class="my-4">

<!--- Welcome Section -->
<section id="evento">
    <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h1 class="display-4">Eventos</h1>
            </div>
            <hr>
            <div class="col-12">
                <p class="lead">Conoce los eventos mas cercanos en el cauca </p>
            </div>
        </div>
    </div>

    <div id="map">></div>

</section>

<footer>
    <div class="container-fluid padding">
        <div class="row text-center">
            <div class="col-md-4">
                <img src="img/w3newbie.png">
                <hr class="light">
                <p>Informacion</p>
                <p>caucaagrosostenible@gmail.com</p>
                <p>Cl 5 #4-70, Popayán, Cauca</p>
                <p>Popayan, Cauca</p>
            </div>
            <div class="col-md-4">
                <hr class="light">
                <h5>Redes</h5>
                <hr class="light">
                <p><img src="img/facebook.png" width="100" alt=""></p>
                <p>Lunes</p>
                <p>Lunes</p>
            </div>
            <div class="col-md-4">
                <hr class="light">
                <h5>Horas</h5>
                <hr class="light">
                <p>Lunes</p>
                <p>Lunes</p>
                <p>Lunes</p>
            </div>
            <div class="col-12">
                <hr class="light">
                <h5>&copy; caucaagro</h5>
            </div>
        </div>
    </div>
</footer>

<script type="text/javascript" src="js/index.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8FmT8OemauzSxiYfQd53vpzsQLemDCbE&callback=initMap">
</script>

</body>
</html>

