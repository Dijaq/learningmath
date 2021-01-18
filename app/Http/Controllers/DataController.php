<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Configuracion;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $user = new User;
        $user->name = 'Diego Alonso';
        $user->email = 'dijaq08@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();

        return "Registrado Satisfactoriamente";
    }

    public function configuracion()
    {  
        $user = new Configuracion;
        $user->tiempo_evaluacion = '180';
        $user->cantidad_ejercicios = '80';
        $user->save();

        return "Configuracion Registrada Satisfactoriamente";
    }
}