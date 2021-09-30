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
            <h3>Crud organizaciones</h3>
            <br>
            <a href="{{url('Organizaciones/create')}}" class="btn btn-success"> Registrar nueva organización</a>
        @endcan
        <br/>
        <br/>
        <table class="table table-light">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Ubicacion</th>
                <th>telefono</th>
                @can('admin.index.create')
                    <th>Acciones</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($organizaciones as $Organizacion)
                <tr>
                    <td>{{$Organizacion->id}}</td>

                    <td>
                        <img class="img-thumbnail" src="{{asset('storage'.'/'.$Organizacion->imagen)}}">
                    </td>

                    <td>{{$Organizacion->nombre}}</td>
                    <td>{{$Organizacion->ubicacion}}</td>
                    <td>{{$Organizacion->telefono}}</td>
                    @can('admin.index.create')
                        <td>
                            <a href="{{url('/Organizaciones/'.$Organizacion->id.'/edit' )}}" class="btn btn-warning">
                                EDITAR
                            </a>
                            |
                            <form action="{{url('/Organizaciones/'.$Organizacion->id)}}" class="d-inline" method="post">
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
