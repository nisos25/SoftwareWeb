<h1>{{$modo}} Evento</h1>

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
<input type="text" class="form-control" name="Nombre" value="{{isset($producto->Nombre)?$producto->Nombre:old('Nombre')}}"  id="Nombre">

</div>

<div class="form-grup">
<label for="Precio"> Ubicación </label>
<input type="text" class="form-control" name="Ubicacion" value="{{isset($producto->precio)?$producto->precio:old('Precio')}}"  id="Precio">
</div>

<input class="btn btn-success" type="submit" Value="{{$modo}} datos">

<a class="btn btn-primary" href="{{url('Eventos')}}"> Regresar </a>

<br>
