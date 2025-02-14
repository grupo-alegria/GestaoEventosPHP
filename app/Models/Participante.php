<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participante extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'cpf',
        'dataNasc',
        'email',        
        'senha'
    ];

    protected $hidden = [
        'senha', 'remember_token',
    ];

    // Especifica o campo de senha personalizado
    public function getAuthPassword()
    {
        return $this->senha; // Use o campo correto do banco de dados
    }

    public function ingresso()
    {
        return $this -> hasMany(Ingresso::class);
    }
}
