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
<a href="{{url('Inversionista/create')}}"  class="btn btn-success" > Registrar nuevo inversionista</a>
@endcan
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>descripcion</th>
            <th>correro</th>
            @can('admin.index.create')
            <th>Acciones</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach($Inversionistas as $Inversionista)
        <tr>
            <td>{{$Inversionista->id}}</td>

            <td>
                <img  class="img-thumbnail" src="{{asset('storage'.'/'.$Inversionista->Imagen)}}" width="100" alt="">
            </td>

            <td>{{$Inversionista->Nombre}}</td>
            <td>{{$Inversionista->descripcion}}</td>
            <td>{{$Inversionista->correo}}</td>
            @can('admin.index.create')
            <td>
                <a href="{{url('/Inversionistas/'.$Inversionista->id.'/edit' )}}" class="btn btn-warning">
                EDITAR
                </a>
                |
            <form action="{{url('/Inversionistas/'.$Inversionista->id)}}"  class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
            <input  class="btn btn-danger" type="submit" onclick="return confirm('¿Deseas borrar?')"
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
