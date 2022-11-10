<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Cargoempleado extends Model
{
    use HasFactory, LogsActivity;
    protected $perPage = 20;
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha_inicio',
        'fecha_fin',
        'persona_id',
        'cargo_id',
        'sueldo'
    ];



    //model Cargoempleado
    //  public function cargos(){
    //      return $this->belongsTo('App\Models\Cargo');
    //    }
    //    public function personas(){
    //      return $this->belongsTo('App\Models\Persona');
    //  }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['fecha_inicio', 'fecha_fin', 'persona_id', 'cargo_id', 'sueldo'])
            ->setDescriptionForEvent(fn (string $eventName) => "{$eventName} Cargo empleado")
            ->useLogName('user');
        // Chain fluent methods for configuration options
    }
}
