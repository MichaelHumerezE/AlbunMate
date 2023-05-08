<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\QueryException;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class OrganizadorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-organizador|crear-organizador|editar-organizador|borrar-organizador', ['only' => 'index']);
        $this->middleware('permission:ver-organizador', ['only' => 'show']);
        $this->middleware('permission:crear-organizador', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-organizador', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-organizador', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $organizadores = User::select('*')->orderBy('id','ASC')->where('tipo_o','=',1);
        $limit = (isset($request->limit)) ? $request->limit:10;
        if(isset($request->search)){
            $organizadores = $organizadores->where('id','like','%'.$request->search.'%')
            ->orWhere('name','like','%'.$request->search.'%')
            ->orWhere('apellidos','like','%'.$request->search.'%')
            ->orWhere('email','like','%'.$request->search.'%')
            ->orWhere('ci','like','%'.$request->search.'%')
            ->orWhere('sexo','like','%'.$request->search.'%')
            ->orWhere('phone','like','%'.$request->search.'%');
        }
        $organizadores = $organizadores->paginate($limit)->appends($request->all());
        return view('organizadores.index', compact('organizadores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organizadores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('organizadores.index')->with('message', 'organizador Agregado Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organizador = User::where('id', '=', $id)->firstOrFail();
        return view('organizadores.show', compact('organizador'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $organizador = User::where('id', '=', $id)->firstOrFail();
        return view('organizadores.edit', compact('organizador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $organizador = User::find($id);
        $organizador->update($request->validated());
        return redirect()->route('organizadores.index')->with('message', 'Se ha actualizado los datos correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $organizador = User::findOrFail($id);
        try{
            $organizador->delete();
            return redirect()->route('organizadores.index')->with('message', 'Se han borrado los datos correctamente.');
        }catch(QueryException $e){
            return redirect()->route('organizadores.index')->with('danger', 'Datos relacionados, imposible borrar dato.');
        }
    }
}
