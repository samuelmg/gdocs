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

    /**
     * Obtiene el nombre y cargo del funcionario en un solo atributo "dinámico" (nombre_cargo)
     * @return string
     */
    public function getNombreCargoAttribute()
    {
        return $this->nombre . ' - ' . $this->cargo;
    }
}
