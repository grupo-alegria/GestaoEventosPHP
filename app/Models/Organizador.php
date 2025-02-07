<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizador extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'cnpj',
        'cpf',
        'email',
        'senha'
    ];


    public function evento()
    {
        return $this -> hasMany(Evento::class);
    }

}
