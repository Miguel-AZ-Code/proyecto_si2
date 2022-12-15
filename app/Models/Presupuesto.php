<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Presupuesto
 *
 * @property $id
 * @property $descripcion
 * @property $total
 * @property $created_at
 * @property $updated_at
 *
 * @property Contrato[] $contratos
 * @property PresupuestoServicio[] $presupuestoServicios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Presupuesto extends Model
{
    use HasFactory;

    static $rules = [
        'descripcion' => 'required',
        'total' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion', 'total'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'presupuesto_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class);
    }
}
