<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\SeccionEjercicios;
use App\Models\Multiplicacion;

class WebController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        $user = auth()->user();
        $secciones = SeccionEjercicios::where('user_id', $user->id)->get();
        return view('math.index', compact('secciones'));
    }

    public function generar(){
        $seccionController = new SeccionEjerciciosController();
        $seccionController->generar();
        return redirect()->route('web.index')->with('success', 'Se Genero Satisfactoriamente');
    }

    public function solve($id)
    {
        $user = auth()->user();
        $seccion = SeccionEjercicios::where('id', $id)->with('multiplicaciones')->first();        
        return view('math.solve', compact('seccion'));
    }
    
    public function resolver(Request $request)
    {
        
        $seccion_ejercicio = SeccionEjercicios::findOrFail($request->seccion_identificador);
        $multiplicaciones = Multiplicacion::where('seccionejercicios_id', $seccion_ejercicio->id)->get();
        $aciertos = 0;
        
        foreach($multiplicaciones as $multiplicacion)
        {
            if($multiplicacion->resultado_correcto === $request->{"multi_".$multiplicacion->id})
            {
                $multiplicacion->es_correcto = true;
                $aciertos = $aciertos+1;
            }
            else{
                $multiplicacion->es_correcto = false;
            }
            $multiplicacion->respuesta_ingresada = $request->{"multi_".$multiplicacion->id};
            $multiplicacion->update();
        }

        $seccion_ejercicio->estado = 'RESUELTO';
        $seccion_ejercicio->cantidad_resuelta = $aciertos;
        $seccion_ejercicio->update();

        $seccion = SeccionEjercicios::where('id', $seccion_ejercicio->id)->with('multiplicaciones')->first();

        return view('math.solution', compact('seccion'));
    }
}
