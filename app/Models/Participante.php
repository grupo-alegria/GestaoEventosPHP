<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'dataNasc',
        'senha'
    ];


    public function ingresso()
    {
        return $this -> hasMany(Ingresso::class);
    }
}
