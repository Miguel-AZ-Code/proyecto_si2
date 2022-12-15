<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Servicio
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $costo
 * @property $created_at
 * @property $updated_at
 *
 * @property PresupuestoServicio[] $presupuestoServicios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Servicio extends Model
{
  use HasFactory;

  static $rules = [
    'nombre' => 'required',
    'descripcion' => 'required',
    'costo' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['nombre', 'descripcion', 'costo'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function presupuestos()
  {
    return $this->belongsToMany(Presupuesto::class);
  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function materiales()
  {
    return $this->belongsToMany(Materiale::class);
  }
}
