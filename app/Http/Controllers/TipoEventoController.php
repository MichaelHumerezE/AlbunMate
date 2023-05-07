<?php

namespace App\Http\Controllers;

use App\Models\TipoEvento;
use App\Http\Requests\StoreTipoEventoRequest;
use App\Http\Requests\UpdateTipoEventoRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TipoEventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tiposEventos = TipoEvento::select('*')->orderBy('id','ASC');
        $limit = (isset($request->limit)) ? $request->limit:10;
        if(isset($request->search)){
            $tiposEventos = $tiposEventos->where('id','like','%'.$request->search.'%')
            ->orWhere('name','like','%'.$request->search.'%');
        }
        $tiposEventos = $tiposEventos->paginate($limit)->appends($request->all());
        return view('tiposEventos.index', compact('tiposEventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiposEventos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipoEventoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoEventoRequest $request)
    {
        tipoEvento::create($request->validated());
        return redirect()->route('tiposEventos.index')->with('mensaje', 'Tipo De Evento Agregado Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoEvento  $tipoEvento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoEvento = tipoEvento::where('id', '=', $id)->firstOrFail();
        return view('tiposEventos.show', compact('tipoEvento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoEvento  $tipoEvento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoEvento = tipoEvento::where('id', '=', $id)->firstOrFail();
        return view('tiposEventos.edit', compact('tipoEvento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoEventoRequest  $request
     * @param  \App\Models\TipoEvento  $tipoEvento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoEventoRequest $request, $id)
    {
        $tipoEvento = tipoEvento::find($id);
        $tipoEvento->update($request->validated());
        return redirect()->route('tiposEventos.index')->with('message', 'Se ha actualizado los datos correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoEvento  $tipoEvento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoEvento = tipoEvento::findOrFail($id);
        try{
            $tipoEvento->delete();
            return redirect()->route('tiposEventos.index')->with('message', 'Se han borrado los datos correctamente.');
        }catch(QueryException $e){
            return redirect()->route('tiposEventos.index')->with('danger', 'Datos relacionados, imposible borrar dato.');
        }
    }
}
