<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogoEventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::paginate(10);
        return view('catalogoEventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Ir a fotos de un determinado evento

    public function store(Request $request)
    {
        $evento = Evento::findOrFail($request->id_evento);
        if ($request->codigo == $evento->codigo) {
            $fotos = Foto::where('id_evento', $evento->id)->get();
            return view('catalogoEventos.fotos', compact('fotos', 'evento'));
        } else {
            return redirect()->route('catalogoEventos.index')->with('danger', 'Código Incorrecto');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Bajar foto - Verificar suscripción

    public function show($id)
    {
        $foto = Foto::where('id', $id)->firstOrFail();
        if (auth()->check()) {
            if (auth()->user()->suscripcion == 1) {
                return Storage::disk('s3')->download($foto->image);
            } else {
                return redirect()->route('catalogoEventos.index')->with('danger', 'Perfil sin suscripción. Elija un nuevo plan de suscripción.');
            }
        } else {
            return redirect('/login')->with('info', 'Para bajar una foto debe logearse!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
