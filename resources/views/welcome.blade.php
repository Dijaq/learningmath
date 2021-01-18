<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    
    
    <script src="{{asset('js/app.js')}}"></script>

	<link rel="icon" href={{asset('storage/favicon.ico')}} type="image/x-icon" />
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">-->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
	<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Radio Yaraví</title>
</head>
<body>
    <div>
        <div class="container">
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
                                {{$multiplicacion->valor1}} x {{$multiplicacion->valor2}} = <input type="text" style="width: 80px" name="multi_{{$multiplicacion->id}}" value="{{$multiplicacion->respuesta_ingresada}}" disabled><i class="fas fa-cloud"></i>
                            </div>
                        @endforeach                   

                        <div class="col-md-12">
                            <input class="btn btn-primary" type="submit" value="Terminar">
                        </div>
                    
                    </div>
                </form>
            </div>
            <footer></footer>
        </div>
    </div>
</body>
</html>
