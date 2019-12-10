<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $fillable = [
        'aluno_id', 'professor_id', 'ano', 'semestre', 'titulo'
    ];
}