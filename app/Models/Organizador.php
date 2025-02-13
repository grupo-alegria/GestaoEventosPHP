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

    protected $hidden = [
        'senha', 'remember_token', // Oculta a senha e o token
    ];


    public function evento()
    {
        return $this -> hasMany(Evento::class);
    }

}