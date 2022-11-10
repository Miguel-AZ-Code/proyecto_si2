<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Marca extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'nombre'
    ];


    public function materiales()
    {
        return $this->hasMany('App\Models\Material', 'marca_id', 'id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nombre'])
            ->setDescriptionForEvent(fn (string $eventName) => "{$eventName} Marca")
            ->useLogName('user');
        // Chain fluent methods for configuration options
    }

}
