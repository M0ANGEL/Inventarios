<?php

namespace App\Models\equipos;

use App\Models\Registro\Registro;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    use HasFactory;

    protected $table = 'equipos';

    protected $fillable = [
        'serial',
        'marca',
        'equipo',
        'users_id',
        'proveedor'
    ];


    protected function serial():Attribute{
        return new Attribute(
            set: fn($value) => strtoupper($value),
        );
    }

    protected function marca():Attribute{
        return new Attribute(
            set: fn($value) => strtoupper($value),
        );
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }

    public function reports(){
        return $this->hasMany(Registro::class);
    }

    public function campo1s()
    {
        return $this->hasMany(Registro::class, 'equipos_id');
    }
}
