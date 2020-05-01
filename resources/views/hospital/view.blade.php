@extends('layout.layout')

@section('titulo')
    Detalle Hospital
@endsection

@section('contenido')
    <h1 class="text-center">Detalle de Hospital</h1>
    <br><br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Nombre: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$hospital->nombre}}</p>
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Direccion: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$hospital->direccion}}</p>
        </div>
            
    </div>
<br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Telefono: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$hospital->telefono}}</p>
        </div>
    </div>
<br>
    <div class="row">
        <div class="col-sm-3">
            <h3>Cantidad de camas: </h3>
        </div>
        <div class="col-sm-3">
            <p class="lead">{{$hospital->cantcamas}}</p>
        </div>            
    </div>
  <br><br>
    

    <div class="row">
       <a href=" {{route('hospital.index')}}"><button class="btn btn-primary">Volver</button></a>
    </div>
@endsection