<?php

namespace App\Http\Controllers;

use App\Models\SeccionEjercicios;
use App\Models\Multiplicacion;
use App\Models\Configuracion;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class SeccionEjerciciosController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        return view('math.index');
    }

    public function generar()
    {
        $config = Configuracion::first();
        $ejercicios = SeccionEjercicios::where('user_id', auth()->user()->id)->get();
        $seccion_ejercicio = new SeccionEjercicios();
        $seccion_ejercicio->user_id = auth()->user()->id;
        $seccion_ejercicio->identificador = count($ejercicios)+1;
        $seccion_ejercicio->cantidad_general = $config->cantidad_ejercicios;
        $seccion_ejercicio->cantidad_resuelta = 0;
        $seccion_ejercicio->tiempo_general = $config->tiempo_evaluacion;
        $seccion_ejercicio->estado = 'GENERADO';
        $seccion_ejercicio->save();

        for($i=0; $i<$seccion_ejercicio->cantidad_general; $i++)
        {
            $multiplicacion = new Multiplicacion();
            $multiplicacion->seccionejercicios_id = $seccion_ejercicio->id;
            $multiplicacion->valor1 = rand(1,9);
            $multiplicacion->valor2 = rand(1,9);
            $multiplicacion->resultado_correcto = $multiplicacion->valor1*$multiplicacion->valor2;
            $multiplicacion->save();

        }

        return "Generado Satisfatoriamente";
    }
}
