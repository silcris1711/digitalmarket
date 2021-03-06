<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    protected $fillable=[
        'nombre'
    ];

    public function municipio()
    {
        return $this->belongsTo('App\Municipio','minicipio_id');
    }

    public function zona()
    {
        return $this->hasMany('App\Zona','parroquia_id');
    }
    
}

