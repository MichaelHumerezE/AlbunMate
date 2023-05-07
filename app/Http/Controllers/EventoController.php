<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Models\FotografoEvento;
use App\Models\TipoEvento;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $eventos = Evento::select('*')->orderBy('id', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 10;
        if (isset($request->search)) {
            $eventos = $eventos->where('id', 'like', '%' . $request->search . '%')
                ->orWhere('name', 'like', '%' . $request->search . '%');
        }
        $eventos = $eventos->paginate($limit)->appends($request->all());
        $tiposEventos = TipoEvento::get();
        return view('eventos.index', compact('eventos', 'tiposEventos'));
    }

    public function indexFE($id_evento)
    {
        $fotografos = User::where('tipo_f', 1)->paginate(10);
        $fotografosEventos = FotografoEvento::where('id_evento', $id_evento)->paginate(10);
        return view('fotografosEventos.index', compact('fotografos', 'fotografosEventos', 'id_evento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposEventos = TipoEvento::get();
        return view('eventos.create', compact('tiposEventos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventoRequest $request)
    {
        $evento = Evento::create($request->validated());
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('eventos/' . $request->carpeta, 's3');
            $evento->image = $path;
            $evento->save();
        }
        return redirect()->route('eventos.index')->with('message', 'Evento Agregado Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = evento::where('id', '=', $id)->firstOrFail();
        $tiposEventos = TipoEvento::get();
        return view('eventos.show', compact('evento', 'tiposEventos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = evento::where('id', '=', $id)->firstOrFail();
        $tiposEventos = TipoEvento::get();
        return view('eventos.edit', compact('evento', 'tiposEventos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventoRequest  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventoRequest $request, $id)
    {
        $evento = evento::find($id);
        $evento->update($request->validated());
        if ($request->hasFile('image')) {
            Storage::disk('s3')->delete('eventos/' . $evento->image);
            $path = $request->file('image')->store('eventos/' . $request->carpeta, 's3');
            $evento->image = $path;
            $evento->save();
        }
        return redirect()->route('eventos.index')->with('message', 'Se ha actualizado los datos correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = evento::findOrFail($id);
        try {
            $carpeta = $evento->carpeta;
            $evento->delete();
            Storage::disk('s3')->deleteDirectory('eventos/' . $carpeta);
            return redirect()->route('eventos.index')->with('message', 'Se han borrado los datos correctamente.');
        } catch (QueryException $e) {
            return redirect()->route('eventos.index')->with('danger', 'Datos relacionados, imposible borrar dato.');
        }
    }
}
