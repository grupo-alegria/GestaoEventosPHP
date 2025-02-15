<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'tipo',
        'data',
        'valor',
        'local',
        'descricao',
        'lotacaoMax',
        'organizador_id'
    ];
    public function ingressos()
    {
        return $this->hasMany(Ingresso::class);
    }


    public function organizador()
    {
        return $this -> belongsTo(Organizador::class);
    }

}
