<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $fillable = [
        'contrato_id',
        'Titulo',
        'URL',
        'created_at',
        'updated_at'
    ];

}
