<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Aws\Rekognition\RekognitionClient;
use Illuminate\Http\Request;

class RecognitionController extends Controller
{
    protected $rekognition;

    public function __construct()
    {
        $this->rekognition = new RekognitionClient([
            'version' => 'latest',
            'region' => env('AWS_DEFAULT_REGION'),
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);
    }
    //public function compareFaces(string $profileImageKey, string $collectionId, float $threshold)
    public function compareFaces(Request $request)
    {
        if (auth()->check()) {
            if (auth()->user()->suscripcion == 1) {
                if (auth()->user()->face <> null) {
                    $profileImageKey = auth()->user()->face;
                    $collectionId = $request->collectionId;
                    $threshold = floatval($request->threshold);
                    $profileImage = [
                        'S3Object' => [
                            'Bucket' => env('AWS_BUCKET'),
                            'Name' => $profileImageKey,
                        ],
                    ];

                    $results = $this->rekognition->searchFacesByImage([
                        'CollectionId' => $collectionId,
                        'FaceMatchThreshold' => $threshold,
                        'Image' => $profileImage,
                        'MaxFaces' => 1000,
                    ]);

                    $similarImages = collect($results['FaceMatches'])->map(function ($match) {
                        return [
                            'similarity' => $match['Similarity'],
                            'key' => $match['Face']['ExternalImageId'],
                        ];
                    });
                    $fotosEnc = collect();
                    foreach ($similarImages as $similarImage) {
                        $foto = Foto::FindOrFail($similarImage['key']);
                        $fotosEnc->push($foto);
                    }
                    return view('recognition.index', compact('fotosEnc'));
                } else {
                    return redirect()->route('perfil.faceView', auth()->user()->id)->with('info', 'Debe tener una imagen de perfil para usar esta funcionalidad.');
                }
            } else {
                return view('planes.index')->with('info', 'Debe suscribirse a un plan para usar esta funcionalidad.');
            }
        } else {
            return redirect()->route('login')->with('info', 'Debe registrarse primero.');
        }
    }
}
