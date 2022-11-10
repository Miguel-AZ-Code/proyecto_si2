<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Proveedor extends Model
{
    use HasFactory, LogsActivity;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nit', 'nombre', 'telefono', 'direccion'];

    public function notas()
    {
        return $this->hasMany('App\Models\Nota', 'proveedor_id', 'id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nit', 'nombre', 'telefono', 'direccion'])
            ->setDescriptionForEvent(fn (string $eventName) => "{$eventName} Proveedor")
            ->useLogName('user');
        // Chain fluent methods for configuration options
    }
}
