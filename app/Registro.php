<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registros';                   
            
    protected $fillable = [
        'fecha_descarga', 'volumen', 'producto', 'medida', 'lugar','user_id','recibe','entrega','remitente','hora_camion','hora_descarga'
    ];
}
