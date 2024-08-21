<?php

namespace App\Models\Registro;

use App\Models\equipos\Equipos;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $table = 'registro';

    protected $fillable = [
        'empresa',
        'users_id',
        'equipos_id',
        'recibe',
        'estado',
        'observacion_entrada',
        'observacion_salida',
        'tc_recibe',
        'fecha_salida',
        'entrega'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }

    public function equipos(){
        return $this->belongsTo(Equipos::class, 'equipos_id');
    }

    public function campo2()
    {
      return $this->belongsTo(Equipos::class, 'equipos_id');
    }

}
