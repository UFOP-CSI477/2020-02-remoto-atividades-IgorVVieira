<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'codigo',
        'periodo',
    ];

    public function provas()
    {
        $this->hasMany(Prova::class, 'disciplina_id', 'id');
    }

    public function disciplinas()
    {
        return $this->belongsToMany(User::class, UserDisciplina::class, 'disciplina_id', 'user_id');
    }
}
