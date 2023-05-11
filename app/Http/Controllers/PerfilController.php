<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use Aws\Rekognition\RekognitionClient;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    private $rekognition;
    private $bucket;
    
    public function __construct()
    {
        $this->rekognition = new RekognitionClient([
            'region' => env('AWS_DEFAULT_REGION'),
            'version' => 'latest',
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);
        $this->bucket = env('AWS_BUCKET');
    }


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
                /*$this->rekognition->deleteCollection([
                    'CollectionId' => strval($perfil->id),
                ]);*/
                $result = $this->rekognition->listFaces([
                    'CollectionId' => strval($perfil->id),
                    'ExternalImageId' => strval($perfil->id),
                ]);
                $faceIds = [];
                foreach ($result['Faces'] as $face) {
                    $faceIds[] = $face['FaceId'];
                }
                $result = $this->rekognition->deleteFaces([
                    'CollectionId' => strval($perfil->id),
                    'FaceIds' => $faceIds,
                ]);
            }
            $this->rekognition->createCollection([
                'CollectionId' => strval($perfil->id),
            ]);
            $path = $request->file('image')->store('perfiles/' . $perfil->email, 's3');
            $perfil->face = $path;
            $perfil->save();
            $this->rekognition->indexFaces([
                'CollectionId' => strval($perfil->id),
                'DetectionAttributes' => ['ALL'],
                'ExternalImageId' => strval($perfil->id),
                'Image' => [
                    'S3Object' => [
                        'Bucket' => $this->bucket,
                        'Name' => $perfil->face,
                    ],
                ],
            ]);
        }
        return redirect()->route('perfil.faceView', $perfil->id)->with('message', 'Foto Agregado Con Éxito');
    }
}
