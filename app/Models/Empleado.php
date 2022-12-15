<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Empleado
 *
 * @property $id
 * @property $dni
 * @property $nombre
 * @property $telefono
 * @property $direccion
 * @property $salario
 * @property $created_at
 * @property $updated_at
 *
 * @property Contrato[] $contratos
 * @property Proyecto[] $proyectos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Empleado extends Model
{
    use HasFactory;

    static $rules = [
        'dni' => 'required',
        'nombre' => 'required',
        'telefono' => 'required',
        'direccion' => 'required',
        'salario' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['dni', 'nombre', 'telefono', 'direccion', 'salario'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'empleado_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proyectos()
    {
        return $this->hasMany('App\Models\Proyecto', 'empleado_id', 'id');
    }
}
