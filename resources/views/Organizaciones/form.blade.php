<h1>{{$modo}} Organizaciones</h1>

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
<input type="text" class="form-control" name="Nombre" value="{{isset($producto->Nombre)?$producto->nombre:old('Nombre')}}"  id="Nombre">

</div>

<div class="form-grup">
<label for="Precio"> Ubicacion </label>
<input type="text" class="form-control" name="Ubicacion" value="{{isset($producto->precio)?$producto->ubicacion:old('Ubicacion')}}"  id="Ubicacion">
</div>

<div class="form-grup">
<label for="Cantidad"> Telefono </label>
<input type="text" class="form-control" name="Telefono" value="{{isset($producto->cantidad)?$producto->telefono:old('Telefono')}}" id="Telefono">

</div>
<div class="form-grup">
<label for="Imagen">  </label>
@if(isset($producto->Imagen))
<img class="img-thumbnail img-fluid" src="{{asset('storage'.'/'.$producto->Imagen)}}" width="100" alt="100s">
@endif
<input type="file"  class="form-control" name="Imagen" value="" id="Imagen">
</div>
<input class="btn btn-success" type="submit" Value="{{$modo}} datos"> 

<a class="btn btn-primary" href="{{url('Organizaciones')}}"> RESGRESAR</a>

<br>   