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

    <link href="peopleStyle.css" rel="stylesheet">
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
                    <a class="nav-link" href="{{ route('emprendimiento') }}">Emprendiminetos y asociaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tienda') }}">Tienda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route ('inversionista') }}">Inversionistas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route ('home') }}#evento">Eventos</a>
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

<section id="team" class="pb-5">
    <div class="container">
        <h5 class="section-title h1">EMPRENDIMIENTOS Y ASOCIACIONES</h5>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" >
                    <div class="mainflip flip-0">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="#" alt="Imagen"></p>
                                    <h4 class="card-title">Emprendimiento1</h4>
                                    <p class="card-text">Testooo</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Emprendimiento1</h4>
                                    <p class="card-text">Información más detallada de este inversionista </p>
                                    <p>Correo@dominion.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" >
                    <div class="mainflip flip-0">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="#" alt="Imagen"></p>
                                    <h4 class="card-title">Emprendimiento2</h4>
                                    <p class="card-text">Testooo</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Emprendimiento2</h4>
                                    <p class="card-text">Información más detallada de este inversionista </p>
                                    <p>Correo@dominion.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" >
                    <div class="mainflip flip-0">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="#" alt="Imagen"></p>
                                    <h4 class="card-title">Emprendimiento3</h4>
                                    <p class="card-text">Testooo</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Emprendimiento3</h4>
                                    <p class="card-text">Información más detallada de este inversionista </p>
                                    <p>Correo@dominion.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" >
                    <div class="mainflip flip-0">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="#" alt="Imagen"></p>
                                    <h4 class="card-title">Emprendimiento4</h4>
                                    <p class="card-text">Testooo</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Emprendimiento4</h4>
                                    <p class="card-text">Información más detallada de este inversionista </p>
                                    <p>Correo@dominion.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" >
                    <div class="mainflip flip-0">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="#" alt="Imagen"></p>
                                    <h4 class="card-title">Emprendimiento5</h4>
                                    <p class="card-text">Testooo</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Emprendimiento5</h4>
                                    <p class="card-text">Información más detallada de este inversionista </p>
                                    <p>Correo@dominion.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="image-flip" >
                    <div class="mainflip flip-0">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="#" alt="Imagen"></p>
                                    <h4 class="card-title">Emprendimiento6</h4>
                                    <p class="card-text">Testooo</p>
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h4 class="card-title">Emprendimiento6</h4>
                                    <p class="card-text">Información más detallada de este inversionista </p>
                                    <p>Correo@dominion.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container-fluid padding">
        <div class="row text-center">
            <div class="col-md-4">
                <img src="img/w3newbie.png">
                <hr class="light">
                <p>3111111111</p>
                <p>correa@dominio.com</p>
                <p>Calle 123 #1-23</p>
                <p>Popayan, Cauca</p>
            </div>
            <div class="col-md-4">
                <hr class="light">
                <h5>Horas</h5>
                <hr class="light">
                <p>Lunes</p>
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
                <h5>&copy; Pagina</h5>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
