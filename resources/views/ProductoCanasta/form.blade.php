<h1>{{$modo}} producto</h1>

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="form-grup">
    <label for="Nombre"> Nombre </label>
    <input type="text" class="form-control" name="Nombre"
           value="{{isset($producto->Nombre)?$producto->Nombre:old('Nombre')}}" id="Nombre">

</div>

<div class="form-grup">
    <label for="Precio"> Precio </label>
    <input type="text" class="form-control" name="Precio"
           value="{{isset($producto->precio)?$producto->precio:old('Precio')}}" id="Precio">
</div>

<div class="form-grup">
    <label for="Cantidad"> Cantidad </label>
    <input type="text" class="form-control" name="Cantidad"
           value="{{isset($producto->cantidad)?$producto->cantidad:old('Cantidad')}}     " id="Cantidad">
</div>

<div class="form-grup">
    <label for="Descuento"> Descuento </label>
    <input type="text" class="form-control" name="Descuento"
           value="{{isset($producto->Descuento)?$producto->Descuento:old('Precio')}}" id="Descuento">
    <br>
    </div>

<div class="form-grup">
    <label for="Imagen"> </label>
    @if(isset($producto->Imagen))
        <img class="img-thumbnail img-fluid" src="{{asset('storage'.'/'.$producto->Imagen)}}" width="100" alt="">
    @endif
    <input type="file" class="form-control" name="Imagen" value="" id="Imagen">
</div>
<br>
<input class="btn btn-success" type="submit" Value="{{$modo}} datos">

<a class="btn btn-primary" href="{{url('Admin')}}"> Regresar </a>

<br>
