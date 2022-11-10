<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Cargo extends Model
{
    use HasFactory, LogsActivity;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable =

    ['nombre'];

    // model Cargo

    public function personas()
    {
        return $this->belongsToMany('App\Models\Persona');
    }

    // public function personas(){
    //   return $this->belongsToMany(Cargo::class,'App\Models\Cargo');
    // }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nombre'])
            ->setDescriptionForEvent(fn (string $eventName) => "{$eventName} Cargo")
            ->useLogName('user');
        // Chain fluent methods for configuration options
    }

}
