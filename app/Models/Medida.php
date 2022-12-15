<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Medida
 *
 * @property $id
 * @property $unidad
 * @property $created_at
 * @property $updated_at
 *
 * @property Materiale[] $materiales
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Medida extends Model
{
    
    static $rules = [
		'unidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['unidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materiales()
    {
        return $this->hasMany('App\Models\Materiale', 'medida_id', 'id');
    }
    

}
