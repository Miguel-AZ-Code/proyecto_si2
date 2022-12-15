<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Documento
 *
 * @property $id
 * @property $nombre
 * @property $url
 * @property $contrato_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Contrato $contrato
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Documento extends Model
{
  use HasFactory;

  static $rules = [
    'nombre' => 'required',
    'url' => 'required',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['nombre', 'url', 'contrato_id'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function contrato()
  {
    return $this->hasOne('App\Models\Contrato', 'id', 'contrato_id');
  }
}
