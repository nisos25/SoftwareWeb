@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{url('/Ofertas/'.$producto->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
@include('Ofertas.form',['modo'=>'Editar'])

</form>
</div>
@endsection
