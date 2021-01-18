@extends('layouts.layout')

@section('contenido')		

    <header>
        <div class="col-md-12 text-center m-4">
            <h1>Metamatica</h1>
        </div>
    </header>
    
    <div class="offset-md-1 col-md-10">
        <div class="my-3">
            <a href="{{route('web.generar')}}" class="btn btn-primary">Crear Item de Ejercicios</a>
        </div>
        <div class=text-center>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">Identificador</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Tiempo</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha</th>
                <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($secciones as $seccion)
                    <tr>
                        <td>{{$seccion->identificador}}</td>
                        <td>{{$seccion->cantidad_resuelta}}/{{$seccion->cantidad_general}}</td>
                        <td>{{$seccion->tiempo_general}}s</td>
                        <td>{{$seccion->estado}}</td>
                        <td>{{$seccion->created_at}}</td>
                        @if($seccion->estado !== 'RESUELTO')
                            <td><a href="{{route('web.solve', $seccion->id)}}" class="btn btn-success">RESOLVER</a></td>
                        @else
                            <td><a href="{{route('web.solve', $seccion->id)}}" class="btn btn-danger">REALIZADO</a></td>
                        @endif
                        
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
    <footer></footer>
@stop
