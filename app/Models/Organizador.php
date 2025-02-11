<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organizador extends Authenticatable
{
    use HasFactory;
    protected $table = 'organizadors';
    
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