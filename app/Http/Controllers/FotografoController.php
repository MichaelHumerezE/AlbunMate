<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\QueryException;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class FotografoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-fotografo|crear-fotografo|editar-fotografo|borrar-fotografo', ['only' => 'index']);
        $this->middleware('permission:ver-fotografo', ['only' => 'show']);
        $this->middleware('permission:crear-fotografo', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-fotografo', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-fotografo', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fotografos = User::select('*')->orderBy('id','ASC')->where('tipo_o','=',1);
        $limit = (isset($request->limit)) ? $request->limit:10;
        if(isset($request->search)){
            $fotografos = $fotografos->where('id','like','%'.$request->search.'%')
            ->orWhere('name','like','%'.$request->search.'%')
            ->orWhere('apellidos','like','%'.$request->search.'%')
            ->orWhere('email','like','%'.$request->search.'%')
            ->orWhere('ci','like','%'.$request->search.'%')
            ->orWhere('sexo','like','%'.$request->search.'%')
            ->orWhere('phone','like','%'.$request->search.'%');
        }
        $fotografos = $fotografos->paginate($limit)->appends($request->all());
        return view('fotografos.index', compact('fotografos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fotografos.create');
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
        return redirect()->route('fotografos.index')->with('message', 'fotografo Agregado Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fotografo = User::where('id', '=', $id)->firstOrFail();
        return view('fotografos.show', compact('fotografo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fotografo = User::where('id', '=', $id)->firstOrFail();
        return view('fotografos.edit', compact('fotografo'));
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
        $fotografo = User::find($id);
        $fotografo->update($request->validated());
        return redirect()->route('fotografos.index')->with('message', 'Se ha actualizado los datos correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fotografo = User::findOrFail($id);
        try{
            $fotografo->delete();
            return redirect()->route('fotografos.index')->with('message', 'Se han borrado los datos correctamente.');
        }catch(QueryException $e){
            return redirect()->route('fotografos.index')->with('danger', 'Datos relacionados, imposible borrar dato.');
        }
    }
}
