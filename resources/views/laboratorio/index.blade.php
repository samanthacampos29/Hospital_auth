@extends('layout.layout')

@section('titulo')
Laboratorios
@endsection

@section('contenido')
<h1 class="text-center">Hospitales</h1>
<br><br>
    @if ($message = Session::get('exito'))
        <div class="alert alert success">
        <p> {{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>              
                <th>Acciones</th>
            <tr>
        </thead>
        <tbody>
            @foreach ($laboratorios as $laboratorio)
            <tr>
                <td>{{$laboratorio -> nombre}}</td>
                <td>{{$laboratorio -> direccion}}</td>
                <td>{{$laboratorio -> telefono}}</td>
                
                <td>
                  <form action="{{route('laboratorio.destroy', $laboratorio->id)}}" method="post">
                    <a href="{{route('laboratorio.show', $laboratorio->id)}}" class="btn btn-info">Ver</a>
                    <a href="{{route('laboratorio.edit', $laboratorio->id)}}" class="btn btn-primary">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
               </td>
            <tr>  
            @endforeach
        </tbody>
    </table>
    <br><br>

    <div class="row">
        <a href="{{route('laboratorio.create')}} "><button class="btn btn-success">Crear laboratorio</button></a>
    </div>
    <div class="row">
        <a href=" {{route('inicio')}}"><button class="btn btn-primary">Volver</button></a>
     </div>
@endsection