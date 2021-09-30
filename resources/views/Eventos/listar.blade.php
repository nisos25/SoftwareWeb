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
<a href="{{url('Eventos/create')}}"  class="btn btn-success" > RESGISTRAR NUEVO PRODUCTO</a>
@endcan
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Ubiacion</th>
            @can('admin.index.create')
            <th>Acciones</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach($eventos as $Evento)
        <tr>
            <td>{{$Evento->id}}</td>
            <td>{{$Evento->Nombre}}</td>
            <td>{{$Evento->ubicacion}}</td>
            @can('admin.index.create')
            <td>
                <a href="{{url('/Eventos/'.$Evento->id.'/edit' )}}" class="btn btn-warning">
                EDITAR
                </a>
                 | 
            <form action="{{url('/Eventos/'.$Evento->id)}}"  class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
            <input  class="btn btn-danger" type="submit" onclick="return confirm('¿quieres borrar?')"
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