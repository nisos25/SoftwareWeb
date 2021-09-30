@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{url('/Organizaciones/'.$Organizacion->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
@include('Organizaciones.form',['modo'=>'Editar'])

</form>
</div>
@endsection
