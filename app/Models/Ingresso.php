<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingresso extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo',
        'valor',
        'status',
        'participante_id',
        'evento_id'
    ];


    public function participante()
    {
        return $this -> belongsTo(Participante::class);
    }
    public function evento()
    {
        return $this -> belongsTo(Evento::class);
    }

}
