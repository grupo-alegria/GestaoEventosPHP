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

    public function getAuthPassword()
    {
        return $this->senha; // Retorna o campo correto da senha
    }


    public function evento()
    {
        return $this -> hasMany(Evento::class);
    }

}