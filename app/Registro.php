<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registros';                   
            
    protected $fillable = [
        'fecha_descarga', 'volumen', 'producto', 'lugar','receptor','repartidor','destinatario','remitente','hora_camion','hora_descarga'        
    ];
}
