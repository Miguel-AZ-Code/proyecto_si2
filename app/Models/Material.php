<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Material extends Model
{
    use HasFactory, LogsActivity;
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'medida_id',
        'marca_id'
    ];


    public function marca()
    {
        return $this->hasOne('App\Models\Marca', 'id', 'marca_id');
    }
    public function medida()
    {
        return $this->hasOne('App\Models\Medida', 'id', 'medida_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nombre', 'descripcion', 'precio', 'medida_id', 'marca_id'])
            ->setDescriptionForEvent(fn (string $eventName) => "{$eventName} Material")
            ->useLogName('user');
        // Chain fluent methods for configuration options
    }
}
