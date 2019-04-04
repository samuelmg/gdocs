<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    public $timestamps = false;
    protected $fillable = ['nombre', 'cargo'];

    /**
     * Establece relación hacia muchos documentos
     * @return type
     */
    public function documentos()
    {
        return $this->belongsToMany(Documento::class);
    }
}
