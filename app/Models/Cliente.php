<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $dni
 * @property $nombre
 * @property $telefono
 * @property $created_at
 * @property $updated_at
 *
 * @property Contrato[] $contratos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
  use HasFactory;

  static $rules = [
    'dni' => 'required',
    'nombre' => 'required',
    'telefono' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['dni', 'nombre', 'telefono'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function contratos()
  {
    return $this->hasMany('App\Models\Contrato', 'cliente_id', 'id');
  }
}
