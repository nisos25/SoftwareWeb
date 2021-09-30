<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link href="css/styles.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>
<body>
<!-- Navigation-->
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

<!-- Header-->
<header class="bg-success py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Canasta agrícola</h1>
            <p class="lead fw-normal text-white-50 mb-0">Compra los mejores productos directo de nuestros productores</p>
        </div>
    </div>
</header>


<!-- Section-->
@foreach($productocanasta as $producto)
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top"  src="{{asset('storage'.'/'.$producto->Imagen)}}"  width="100" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{$producto->Nombre}}</h5>
                            <!-- Product price-->
                            {{$producto->precio}}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href={{url('/ProductoCanasta/'.$producto->id.'/edit' )}}>Añador al carrito</a></div>
                    </div>
                </div>
            </div>           
</section>
@endforeach 

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
