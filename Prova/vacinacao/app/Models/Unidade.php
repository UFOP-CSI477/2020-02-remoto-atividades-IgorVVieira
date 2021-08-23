<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'bairro',
        'cidade',
    ];

    public function registros()
    {
        return $this->hasMany(Registro::class, 'unidade_id', 'id');
    }
}