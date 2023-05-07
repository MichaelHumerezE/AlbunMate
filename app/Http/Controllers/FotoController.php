<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Http\Requests\StoreFotoRequest;
use App\Http\Requests\UpdateFotoRequest;
use App\Models\Evento;
use App\Models\FotografoEvento;
use App\Models\TipoEvento;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
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
        $eventosF = FotografoEvento::where('id_fotografo', auth()->user()->id)->get();
        return view('fotos.index', compact('eventos', 'tiposEventos', 'eventosF'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function fotos($id_evento)
    {
        $fotos = Foto::where('id_evento', $id_evento)->paginate(10);
        return view('fotos.fotos', compact('fotos', 'id_evento'));
    }

    public function create()
    {
        //
    }

    public function create2($id_evento)
    {
        return view('fotos.create', compact('id_evento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFotoRequest $request)
    {
        $evento = Evento::where('id', $request->id_evento)->firstOrFail();
        $foto = Foto::create($request->validated());
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('eventos/' . $evento->carpeta, 's3');
            $foto->image = $path;
            $foto->save();
        }
        return redirect()->route('fotos.fotos', $evento->id)->with('message', 'Foto Agregado Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foto = Foto::findOrFail($id);
        return redirect(Storage::disk('s3')->url($foto->image));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit(Foto $foto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFotoRequest  $request
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFotoRequest $request, Foto $foto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foto = Foto::where('id', $id)->first();
        $evento = evento::where('id', $foto->id_evento)->first();
        $image = $foto->image;
        try {
            $foto->delete();
            Storage::disk('s3')->delete($image);
            return redirect()->route('fotos.fotos', $evento->id)->with('message', 'Se han borrado los datos correctamente.');
        } catch (QueryException $e) {
            return redirect()->route('fotos.fotos', $evento->id)->with('danger', 'Datos relacionados, imposible borrar dato.');
        }
    }
}
