<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Medida extends Model
{
    use HasFactory, LogsActivity;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable =
    [
        'unidad'
    ];

    public function materiales()
    {
        return $this->hasMany('App\Models\Material', 'medida_id', 'id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['unidad'])
            ->setDescriptionForEvent(fn (string $eventName) => "{$eventName} Medida")
            ->useLogName('user');
        // Chain fluent methods for configuration options
    }
}
