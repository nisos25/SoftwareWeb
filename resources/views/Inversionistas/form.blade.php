<h1>{{$modo}} inversionita</h1>

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
    <label for="Descripcion">Descripcion </label>
    <input type="text" class="form-control" name="Descripcion"
           value="{{isset($producto->descripcion)?$producto->descripcion:old('Descripcion')}}" id="Descripcion">
</div>

<div class="form-grup">
    <label for="Correo"> Correo </label>
    <input type="text" class="form-control" name="Correo"
           value="{{isset($producto->correo)?$producto->correo:old('Correo')}}" id="Correo">
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

<a class="btn btn-primary" href="{{url('Inversionista')}}"> Regresar</a>

<br>
