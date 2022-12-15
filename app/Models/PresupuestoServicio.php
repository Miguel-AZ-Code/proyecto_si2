<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresupuestoServicio extends Model
{
    use HasFactory;

    protected $table = 'presupuesto_servicio';

    protected $fillable = [
        'presupuesto_id',
        'servicio_id',
    ];
}
