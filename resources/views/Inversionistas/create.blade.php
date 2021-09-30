@extends('layouts.app')
@section('content')
<div class="container">

<form  action="{{url ('/Inversionista')}}" method="post" enctype="multipart/form-data">
@csrf
@include('Inversionistas.form',['modo'=>'Crear'])
</form>
</div>
@endsection
