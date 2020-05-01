@extends('layout.layout')

@section('titulo')
    Detalle Diagnostico
@endsection

@section('contenido')
    <h1 class="text-center">Detalle de Diagnostico</h1>
    <br><br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Tipo: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$diagnostico->tipo}}</p>
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Complicaciones: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$diagnostico->complicaciones}}</p>
        </div>
            
    </div>
<br>
     <br><br>
    

    <div class="row">
       <a href=" {{route('diagnostico.index')}}"><button class="btn btn-primary">Volver</button></a>
    </div>
@endsection