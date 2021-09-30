@extends('layouts.app')
@section('content')
<div class="container">

<form  action="{{url ('/Organizaciones')}}" method="post" enctype="multipart/form-data">
@csrf
@include('Organizaciones.form',['modo'=>'Crear'])
</form>
</div>
@endsection
