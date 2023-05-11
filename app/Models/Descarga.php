<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hora',
        'id_fotografo',
        'id_invitado',
        'id_foto',
        'id_evento',
    ];
}
