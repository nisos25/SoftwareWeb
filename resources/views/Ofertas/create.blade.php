@extends('layouts.app')
@section('content')
<div class="container">

<form  action="{{url ('/Ofertas')}}" method="post" enctype="multipart/form-data">
@csrf
@include('Ofertas.form',['modo'=>'Crear']);
</form>
</div>
@endsection