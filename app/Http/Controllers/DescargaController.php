<?php

namespace App\Http\Controllers;

use App\Models\Descarga;
use App\Http\Requests\StoreDescargaRequest;
use App\Http\Requests\UpdateDescargaRequest;
use App\Models\Foto;
use App\Models\User;
use Illuminate\Http\Request;

date_default_timezone_set('America/La_Paz');


class DescargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $descargas = Descarga::select(
            'descargas.id',
            'descargas.fecha',
            'descargas.hora',
            'descargas.id_fotografo',
            'descargas.id_invitado',
            'descargas.id_foto',
            'eventos.name'
        )->join('eventos', 'descargas.id_evento', '=', 'eventos.id')->orderBy('id', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 10;
        if (isset($request->search)) {
            $descargas = $descargas->where('fecha', 'like', '%' . $request->search . '%')
                ->orWhere('hora', 'like', '%' . $request->search . '%');
        }
        $descargas = $descargas->paginate($limit)->appends($request->all());
        $users = User::get();
        return view('descargas.descargas', compact('descargas', 'users'));
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
     * @param  \App\Http\Requests\StoreDescargaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDescargaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Descarga  $descarga
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $descargas = Descarga::select(
            'descargas.id',
            'descargas.fecha',
            'descargas.hora',
            'descargas.id_fotografo',
            'descargas.id_invitado',
            'eventos.name'
        )->join('eventos', 'descargas.id_evento', '=', 'eventos.id')->
        where('id_invitado', $id)->orderBy('id', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 10;
        if (isset($request->search)) {
            $descargas = $descargas->where('fecha', 'like', '%' . $request->search . '%')
                ->orWhere('hora', 'like', '%' . $request->search . '%');
        }
        $descargas = $descargas->paginate($limit)->appends($request->all());
        $users = User::get();
        return view('descargas.index', compact('descargas', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Descarga  $descarga
     * @return \Illuminate\Http\Response
     */
    public function edit(Descarga $descarga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDescargaRequest  $request
     * @param  \App\Models\Descarga  $descarga
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDescargaRequest $request, Descarga $descarga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Descarga  $descarga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Descarga $descarga)
    {
        //
    }
}
