<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioMaterial extends Model
{
    use HasFactory;

    protected $table = 'materiale_servicio';

    protected $fillable = [
        'servicio_id',
        'materiale_id'
    ];
}
