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
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
            @can('admin.index.create')
            <th>Acciones</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach($carritos as $producto)
        <tr>
            <td>{{$producto->id}}</td>
            <td>{{$producto->Nombre}}</td>
            <td>{{$producto->cantidad}}</td>
            <td>{{$producto->precio}}</td>
            @can('admin.index.create')
            <td>
            <form action="{{url('/Carrito/'.$producto->id)}}"  class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
            <input  class="btn btn-danger" type="submit" onclick="return confirm('¿quieres borrar?')"
            value="Borrar">
            </form>

            </td>
            @endcan
        </tr>
        @endforeach

        <div>
        <?php 
           $t=0?>
        @foreach($total as $suma)
           <?php 
            $t=(($suma->cantidad)*($suma->precio)+$t);
           ?>
        @endforeach
        </div>
    </tbody>
</table>

<div>
    <h1>Total a pagar {{$t}}</h1>
</div>

</div>



@endsection