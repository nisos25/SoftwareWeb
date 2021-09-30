@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{url('/Eventos/'.$producto->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
@include('Eventos.form',['modo'=>'Editar'])

</form>
</div>
@endsection
