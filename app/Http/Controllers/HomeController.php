<?php

namespace App\Http\Controllers;

use App\Models\Suscripcion;
use App\Models\User;

date_default_timezone_set('America/La_Paz');

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()) {
            HomeController::act();
            $tipo_i = auth()->user()->tipo_i;
            if ($tipo_i == 1) {
                return view('inicio');
            } else {
                return view('home.index');
            }
        }
        return view('inicio');
    }

    Public function act(){
        $user = User::findOrFail(auth()->user()->id);
        $suscripcion = Suscripcion::where('id_usuario', $user->id)->orderByDesc('id')->first();
        $fecha_act = date('Y-m-d');
        if ($user->tipo_p <> 1 && $suscripcion->fechaFin < $fecha_act){
            $user->suscripcion = 0;
            $user->save();
        }
    }
}
