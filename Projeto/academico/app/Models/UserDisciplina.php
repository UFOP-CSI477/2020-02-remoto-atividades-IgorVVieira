<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDisciplina extends Model
{
    use HasFactory;

    protected $fillable = [
        'staus',
        'user_id',
        'disciplina_id',
    ];
}
