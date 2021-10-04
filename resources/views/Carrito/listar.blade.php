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
<body class="d-flex flex-column min-vh-100">

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
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Compras
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('tienda') }}">
                            Tienda
                        </a>
                        <a class="dropdown-item" href="{{ route('ofertasTienda') }}">
                            Agrooferta
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route ('inversionistaTienda') }}">Inversionistas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route ('home') }}#evento">Eventos</a>
                </li>
            </ul>
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="navbar-brand" href="{{route('home')}}"><img src="img/carrito.png"></a>
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

<div class="container">

    @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{Session::get('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <br/>
    <br/>
    <table class="table table-light">
        <thead class="thead-light">
        <tr>
            <th>Producto</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Acciones</th>

        </tr>
        </thead>
        <tbody>
        @guest
        @foreach($carritos as $producto)
        @if( $producto->id_usuario == 0)
        <tr>
                <td><img class="img-thumbnail" src="{{asset('storage'.'/'.$producto->imagen)}}" width="100" alt="">
                </td>
                <td>{{$producto->Nombre}}</td>
                <td>{{$producto->cantidad}}</td>
                <td>{{$producto->precio}}</td>
                    <td>
                        <form action="{{url('/carrito/delete/'.$producto->id, 0)}}" class="d-inline" method="post">
                            @csrf
                            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas borrar?')"
                                   value="Borrar">
                        </form>

                    </td>
            </tr>
            @endif
         @endforeach
        @else
        @foreach($carritos as $producto)
            @if( $producto->id_usuario == Auth::user()->id)
            <tr>
                <td><img class="img-thumbnail" src="{{asset('storage'.'/'.$producto->imagen)}}" width="100" alt="">
                </td>
                <td>{{$producto->Nombre}}</td>
                <td>{{$producto->cantidad}}</td>
                <?php $preciodescuento= $producto->precio-$producto->descuento ?>
                    <td> ${{$preciodescuento}} </td>

                @can('admin.index.create')
                    <td>
                        <form action="{{url('/carrito/delete/'.$producto->id, Auth::user()->id)}}" class="d-inline" method="post">
                            @csrf
                            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas borrar?')"
                                   value="Borrar">
                        </form>

                    </td>
                @endcan
            </tr>
            @endif
        @endforeach
        @endguest
        @guest
        <div>
            <?php
            $t = 0;
            $descuentos=0;
            ?>
            @foreach($total as $suma)
                @if( $suma->id_usuario == 0)
                <?php
                $t = (($suma->cantidad) * ($suma->precio - $suma->descuento) + $t);
                $descuentos= $suma->descuento+ $descuentos;
                ?>
                @endif
            @endforeach
        </div>
        @else
        <div>
            <?php
            $t = 0;
            $descuentos2=0;
            ?>
            @foreach($total as $suma)
                @if( $suma->id_usuario == Auth::user()->id)
                <?php
                $t = (($suma->cantidad) * ($suma->precio - $suma->descuento) + $t);
                $descuentos2= $suma->descuento + $descuentos2;
                ?>
                @endif
            @endforeach
        </div>
        @endguest
        </tbody>
    </table>

    <div>
        <h1>Total a pagar ${{$t}} ahorro de ${{$descuentos2}} </h1>
    </div>

</div>

<footer class="mt-auto">
    <div class="container-fluid padding">
        <div class="row text-center">
            <div class="col-md-4">
                <img src="img/logoFooter.png">
                <hr class="light">
                <p>Información</p>
                <p>cauca@agrosostenible.com</p>
                <p>Cl 5 #4-70, Popayán, Cauca</p>
                <p>Popayán, Cauca</p>
            </div>
            <div class="col-md-4">
                <hr class="light">
                <h5>Redes</h5>
                <hr class="light">
                <p><img src="img/facebook.png" width="50" alt=""> <img src="img/twitter.png" width="50" alt=""> <img src="img/instagram.png" width="50" alt=""></p>
            </div>
            <div class="col-md-4">
                <hr class="light">
                <h5>Horario de atención</h5>
                <hr class="light">
                <p>Lunes-Sábado: 7:30 - 19:00</p>
                <p>Domingos-Festivos: 9:00 - 18:00</p>
            </div>
            <div class="col-12">
                <hr class="light">
                <h5>&copy; Caucaagro</h5>
            </div>
        </div>
    </div>
</footer>

</body>
</html>

