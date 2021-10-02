@extends('layouts.app')
@section('content')
<div class="container">
<form  action="{{url ('AdminHome2')}}" method="post" enctype="multipart/form-data">
@csrf
@include('ProductoCanasta.form',['modo'=>'Crear'])
</form>
</div>
@endsection
