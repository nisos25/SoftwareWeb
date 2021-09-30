@extends('layouts.app')
@section('content')
<div class="container">

<form  action="{{url ('/Eventos')}}" method="post" enctype="multipart/form-data">
@csrf
@include('Eventos.form',['modo'=>'Crear']);
</form>
