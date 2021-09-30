<h1>{{$modo}} organizaciones</h1>

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
           value="{{isset($Organizacion->nombre)?$Organizacion->nombre:old('Nombre')}}" id="Nombre">

</div>

<div class="form-grup">
    <label for="Ubicacion"> Ubicacion </label>
    <input type="text" class="form-control" name="Ubicacion"
           value="{{isset($Organizacion->ubicacion)?$Organizacion->ubicacion:old('Ubicacion')}}" id="Ubicacion">
</div>

<div class="form-grup">
    <label for="Telefono"> Telefono </label>
    <input type="text" class="form-control" name="Telefono"
           value="{{isset($Organizacion->telefono)?$Organizacion->telefono:old('Telefono')}}" id="Telefono">
    <br>
</div>
<div class="form-grup">
    <label for="Imagen"> </label>
    @if(isset($Organizacion->imagen))
        <img class="img-thumbnail img-fluid" src="{{asset('storage'.'/'.$Organizacion->imagen)}}" width="100" alt="100s">
    @endif
    <input type="file" class="form-control" name="Imagen" value="" id="Imagen">
</div>
<br>
<input class="btn btn-success" type="submit" Value="{{$modo}} datos">

<a class="btn btn-primary" href="{{url('Organizaciones')}}"> Regresar </a>

<br>
