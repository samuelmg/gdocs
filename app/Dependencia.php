<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    public $timestamps = false;

    // Solo se requiere si el nombre de la tabla es diferente al plural del modelo
    // protected $table = "dependencias";
}
