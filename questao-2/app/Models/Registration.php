<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'matricula',
        'satifaction_id',
        'comunicacao',
        'comunicacao_professores',
        'comunicacao_coordenadores',
        'avaliacoes',
        'opiniao'
    ];

    public function satisfaction()
    {
        return $this->hasOne(Satisfaction::class, 'id');
    }
}
