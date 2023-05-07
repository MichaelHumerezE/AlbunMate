<?php

namespace App\Http\Controllers;

use App\Models\Suscripcion;
use App\Http\Requests\StoreSuscripcionRequest;
use App\Http\Requests\UpdateSuscripcionRequest;
use Illuminate\Http\Request;

class SuscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagos = Suscripcion::select(
            'suscripcions.id',
            'suscripcions.fechaIni',
            'suscripcions.fechaFin',
            'suscripcions.monto',
            'suscripcions.plan',
            'users.name'
        )->join('users', 'suscripcions.id_usuario', '=', 'users.id')->orderBy('id', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit : 10;
        if (isset($request->search)) {
            $pagos = $pagos->where('fechaIni', 'like', '%' . $request->search . '%')
                ->orWhere('fechaFin', 'like', '%' . $request->search . '%')
                ->orWhere('monto', 'like', '%' . $request->search . '%')
                ->orWhere('plan', 'like', '%' . $request->search . '%');
        }
        $pagos = $pagos->paginate($limit)->appends($request->all());
        return view('pagos.suscripciones', compact('pagos'));
    }

    public function planUser()
    {
        return view('planes.index');
    }

    public function pagosUsers(Request $request)
    {
        $pagos = Suscripcion::select('*')->orderBy('id', 'ASC')->where('id_usuario', '=', auth()->user()->id);
        $limit = (isset($request->limit)) ? $request->limit : 10;
        if (isset($request->search)) {
            $pagos = $pagos->where('fechaIni', 'like', '%' . $request->search . '%')
                ->orWhere('fechaFin', 'like', '%' . $request->search . '%')
                ->orWhere('monto', 'like', '%' . $request->search . '%')
                ->orWhere('plan', 'like', '%' . $request->search . '%');
        }
        $pagos = $pagos->paginate($limit)->appends($request->all());
        return view('pagos.index', compact('pagos'));
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
     * @param  \App\Http\Requests\StoreSuscripcionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuscripcionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suscripcion  $suscripcion
     * @return \Illuminate\Http\Response
     */
    public function show(Suscripcion $suscripcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suscripcion  $suscripcion
     * @return \Illuminate\Http\Response
     */
    public function edit(Suscripcion $suscripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuscripcionRequest  $request
     * @param  \App\Models\Suscripcion  $suscripcion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuscripcionRequest $request, Suscripcion $suscripcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suscripcion  $suscripcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suscripcion $suscripcion)
    {
        //
    }
}
