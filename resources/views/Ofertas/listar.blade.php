@extends('layouts.app')

@section('content')
    <div class="container">

        @if(Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{Session::get('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" arial-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @can('admin.index.create')
            <h3>Crud ofertas</h3>
            <br>
            <a href="{{url('Ofertas/create')}}" class="btn btn-success"> Registrar nueva oferta</a>
        @endcan
        <br/>
        <br/>
        <table class="table table-light">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>cantidad</th>
                <th>Descuento</th>
                <th>precio</th>
                @can('admin.index.create')
                    <th>Acciones</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($ofertas as $Oferta)
                <tr>
                    <td>{{$Oferta->id}}</td>

                    <td>
                        <img class="img-thumbnail" src="{{asset('storage'.'/'.$Oferta->Imagen)}}" width="100" alt="">
                    </td>

                    <td>{{$Oferta->Nombre}}</td>
                    <td>{{$Oferta->cantidad}}</td>
                    <td>{{$Oferta->descuento}}</td>
                    <td>{{$Oferta->precio}}</td>
                    @can('admin.index.create')
                        <td>
                            <a href="{{url('/Ofertas/'.$Oferta->id.'/edit' )}}" class="btn btn-warning">
                                EDITAR
                            </a>
                            |
                            <form action="{{url('/Ofertas/'.$Oferta->id)}}" class="d-inline" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas borrar?')"
                                       value="Borrar">
                            </form>

                        </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



@endsection
