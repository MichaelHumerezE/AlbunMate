<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()) {
            $tipo_i = auth()->user()->tipo_i;
            $tipo_p = auth()->user()->tipo_p;
            if ($tipo_i == 1) {
                return view('inicio');
            } else {
                return view('home.index');
            }
        }
        return view('inicio');
    }
}
