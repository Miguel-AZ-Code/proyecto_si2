<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Materiale
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $costo
 * @property $stock
 * @property $medida_id
 * @property $created_at
 * @property $updated_at
 *
 * @property EntradaMaterial[] $entradaMaterials
 * @property Medida $medida
 * @property SalidaMaterial[] $salidaMaterials
 * @property ServicioMaterial[] $servicioMaterials
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Materiale extends Model
{
    use HasFactory;

    static $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'costo' => 'required',
        'stock' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion', 'costo', 'stock', 'medida_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function entradas()
    {
        return $this->belongsToMany(Entrada::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function medida()
    {
        return $this->hasOne('App\Models\Medida', 'id', 'medida_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function salidas()
    {
        return $this->belongsToMany(Salida::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class);
    }
}
