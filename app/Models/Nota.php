<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Nota extends Model
{
    use HasFactory, LogsActivity;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable =
    [
        'tipo',
        'descripcion',
        'fecha',
        'persona_id',
        'proveedor_id'
    ];

    public function persona()
    {
        return $this->hasOne('App\Models\Persona', 'id', 'persona_id');
    }
    public function proveedor()
    {
        return $this->hasOne('App\Models\Proveedor', 'id', 'proveedor_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['tipo', 'descripcion', 'fecha', 'persona_id', 'proveedor_id'])
            ->setDescriptionForEvent(fn (string $eventName) => "{$eventName} Nota")
            ->useLogName('user');
        // Chain fluent methods for configuration options
    }
}
