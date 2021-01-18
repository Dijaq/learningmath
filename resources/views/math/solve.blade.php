@extends('layouts.layout')

@section('contenido')		

    <header>
        <div class="col-md-12 text-center">
            <h1>Siguiendo la Tabla</h1>
        </div>
    </header>
    <div class="offset-md-2 col-md-8 text-center">
        <form method="POST" action="{{route('web.resolver')}}">
            <div class="row">
            
                {!!csrf_field()!!}
                <input type="hidden" value="{{$seccion->id}}" name="seccion_identificador">
                @foreach($seccion->multiplicaciones as $multiplicacion)
                    <div class="col-md-3 mt-2"> 
                        {{$multiplicacion->valor1}} x {{$multiplicacion->valor2}} = <input type="text" style="width: 80px" name="multi_{{$multiplicacion->id}}">
                    </div>
                @endforeach                   

                <div class="col-md-12 my-4">
                    <input class="btn btn-primary" type="submit" value="Terminar">
                </div>
            
            </div>
        </form>
    </div>
    <footer></footer>
@stop
