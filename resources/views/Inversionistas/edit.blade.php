@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{url('/Inversionista/'.$producto->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
@include('Inversionistas.form',['modo'=>'Editar'])

</form>
</div>
@endsection
