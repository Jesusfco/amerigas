<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    
    protected $fillable = [
        'fecha', 'descripcion', 'fechaEng', 'descripcionEng', 'img'
    ];
    
    protected $table = 'curriculum';                   
    
    public $timestamps = false;
    
}
