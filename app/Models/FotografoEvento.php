<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotografoEvento extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_fotografo',
        'id_evento',
    ];
}
