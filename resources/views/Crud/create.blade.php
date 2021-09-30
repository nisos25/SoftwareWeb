@extends('layouts.app')
@section('content')
<div class="container">

<form  action="{{url ('/Crud')}}" method="post" enctype="multipart/form-data">
@csrf
@include('ProductoCanasta.form',['modo'=>'Crear']);
</form>
</div>
@endsection