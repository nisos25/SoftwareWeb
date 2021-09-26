@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{url('/ProductoCanasta/'.$producto->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
@include('ProductoCanasta.form',['modo'=>'Editar']);

</form>
</div>
@endsection