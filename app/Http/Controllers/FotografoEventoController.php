<?php

namespace App\Http\Controllers;

use App\Models\FotografoEvento;
use App\Http\Requests\StoreFotografoEventoRequest;
use App\Http\Requests\UpdateFotografoEventoRequest;
use App\Models\User;
use Illuminate\Database\QueryException;

class FotografoEventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create2($id_evento)
    {
        $fotografos = User::where('tipo_f', 1)->get();
        return view('fotografosEventos.create', compact('fotografos', 'id_evento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFotografoEventoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFotografoEventoRequest $request)
    {
        $fotografoEvento = FotografoEvento::create($request->validated());
        return redirect()->route('eventos.index')->with('message', 'Fotógrafo Agregado Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FotografoEvento  $fotografoEvento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'hola';
        $fotografoEvento = FotografoEvento::where('id', '=', $id)->firstOrFail();
        $fotografos = User::where('tipo_f', 1)->get();
        return view('fotografosEventos.show', compact('fotografoEvento', 'fotografos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FotografoEvento  $fotografoEvento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fotografoEvento = FotografoEvento::where('id', '=', $id)->firstOrFail();
        $fotografos = User::where('tipo_f', 1)->get();
        return view('fotografosEventos.show', compact('fotografoEvento', 'fotografos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFotografoEventoRequest  $request
     * @param  \App\Models\FotografoEvento  $fotografoEvento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFotografoEventoRequest $request, $id)
    {
        $fotografoEvento = FotografoEvento::find($id);
        $fotografoEvento->update($request->validated());
        return redirect()->route('eventos.index')->with('message', 'Se ha actualizado los datos correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FotografoEvento  $fotografoEvento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fotografoEvento = FotografoEvento::findOrFail($id);
        try {
            $fotografoEvento->delete();
            return redirect()->route('eventos.index')->with('message', 'Se han borrado los datos correctamente.');
        } catch (QueryException $e) {
            return redirect()->route('eventos.index')->with('danger', 'Datos relacionados, imposible borrar dato.');
        }
    }
}
