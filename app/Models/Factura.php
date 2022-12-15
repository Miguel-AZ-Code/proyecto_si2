<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Factura
 *
 * @property $id
 * @property $nit
 * @property $total
 * @property $fecha
 * @property $metodo_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Contrato[] $contratos
 * @property Metodo $metodo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Factura extends Model
{
    use HasFactory;

    static $rules = [
        'nit' => 'required',
        'total' => 'required',
        'fecha' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nit', 'total', 'fecha', 'metodo_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'factura_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function metodo()
    {
        return $this->hasOne('App\Models\Metodo', 'id', 'metodo_id');
    }
}
