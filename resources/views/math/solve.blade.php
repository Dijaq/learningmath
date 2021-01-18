@extends('layouts.layout')

@section('contenido')

    <header>
        <div class="col-md-12 text-center">
            <h1>MULTIPLICANDO</h1>
            <h4> MEJORA TU TIEMPO </h4>
        </div>
        <div style="text-align: right; margin-right: 10px;">
            <h1><span id="countdown" class="timer"></span></h1>
        </div>
    </header>
    <div class="offset-md-2 col-md-8 text-center">
        <form method="POST" action="{{route('web.resolver')}}">
            <div class="row">

                {!!csrf_field()!!}
                <input type="hidden" value="{{$seccion->id}}" name="seccion_identificador">
                @foreach($seccion->multiplicaciones as $multiplicacion)
                    <div class="col-md-3 mt-2">
                        <div style="font-weight: bold; display: inline-block;">{{$multiplicacion->valor1}} x {{$multiplicacion->valor2}} = </div><input type="text" style="width: 70px" name="multi_{{$multiplicacion->id}}">
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

<script>
      var seconds = 180;
      function secondPassed() {
      var minutes = Math.round((seconds - 30)/60);
      var remainingSeconds = seconds % 60;
      if (remainingSeconds < 10) {
         remainingSeconds = "0" + remainingSeconds;
      }
      document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
      if (seconds == 0) {
       clearInterval(countdownTimer);
       document.getElementById('countdown').innerHTML = "TERMINO";
      } else {
       seconds--;
      }
      }
      var countdownTimer = setInterval('secondPassed()', 1000);
</script>
