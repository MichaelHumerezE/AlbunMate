<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->user()) {
            $tipo_i = auth()->user()->tipo_i;
            if ($tipo_i == 1) {
                return view('inicio');
            } else {
                return view('home.index');
            }
        }
        return view('inicio')->with('message', 'Se ha actualizado los datos correctamente.');
    }

    public function edit($id)
    {
        $perfil = User::where('id', '=', $id)->firstOrFail();
        if($perfil->tipo_p == 1 || $perfil->tipo_o == 1 || $perfil->tipo_f == 1){
            return view('perfil.edit', compact('perfil'));
        }else{
            return view('perfil.editInv', compact('perfil'));
        }
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $perfil = User::find($id);
        $perfil->update($request->validated());
        return redirect()->route('perfil.index')->with('message', 'Se ha actualizado los datos correctamente.');
    }

    public function faceView($id)
    {
        $perfil = User::where('id', '=', $id)->firstOrFail();
        if($perfil->tipo_p == 1 || $perfil->tipo_o == 1 || $perfil->tipo_f == 1){
            return view('perfil.face', compact('perfil'));
        }else{
            return view('perfil.faceInv', compact('perfil'));
        }
    }

    public function faceSave(Request $request)
    {
        $perfil = User::where('id', '=', auth()->user()->id)->firstOrFail();
        if ($request->hasFile('image')) {
            if(isset($perfil->face)){
                Storage::disk('s3')->delete($perfil->face);
            }
            $path = $request->file('image')->store('perfiles/' . $perfil->email, 's3');
            $perfil->face = $path;
            $perfil->save();
        }
        return redirect()->route('perfil.faceView', $perfil->id)->with('message', 'Foto Agregado Con Éxito');
    }
}
