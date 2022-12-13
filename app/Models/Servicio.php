<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;

class Servicio extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'nombre',
        'descripcion',
        'costo'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nombre', 'descripcion', 'costo'])
            ->setDescriptionForEvent(fn (string $eventName) => "{$eventName} Servicio")
            ->useLogName('user');
        // Chain fluent methods for configuration options
    }
}
