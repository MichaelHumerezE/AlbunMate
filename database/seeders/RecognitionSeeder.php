<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Foto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Aws\Rekognition\RekognitionClient;

class RecognitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Configurar el cliente de Amazon Rekognition
        $rekognition = new RekognitionClient([
            'region' => env('AWS_DEFAULT_REGION'),
            'version' => 'latest',
            'credentials' => [
                'key' => env('AWS_ACCESS_KEY_ID'),
                'secret' => env('AWS_SECRET_ACCESS_KEY'),
            ],
        ]);

        // Especificar el nombre del bucket de S3 y el nombre del archivo de la imagen
        $bucket = env('AWS_BUCKET');
        
        $eventos = Evento::get();
        foreach ($eventos as $evento) {
            /*$result = $rekognition->deleteCollection([
                'CollectionId' => $evento->carpeta,
            ]);*/
            $result = $rekognition->createCollection([
                'CollectionId' => $evento->carpeta,
            ]);
            $fotos = Foto::where('id_evento', $evento->id)->get();
            foreach ($fotos as $foto) {
                $filename = $foto->image;

                // Especificar el nombre de la colección de Amazon Rekognition
                $collectionName = $evento->carpeta;

                // Llamar a la función indexFaces para registrar la imagen en la colección
                $result = $rekognition->indexFaces([
                    'CollectionId' => $collectionName,
                    'DetectionAttributes' => ['ALL'],
                    'ExternalImageId' => strval($foto->id),
                    'Image' => [
                        'S3Object' => [
                            'Bucket' => $bucket,
                            'Name' => $filename,
                        ],
                    ],
                ]);

                // Mostrar el resultado de la función indexFaces
                //dd($result);
            }
        }
    }
}
