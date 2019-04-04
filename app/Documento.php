<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    //protected $fillable = ['envia', 'no_oficio', 'fecha_oficio', 'recibido'];
    protected $guarded = ['id'];

    /**
     * Establece relación hacia un usuario
     * @return type
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Establece relación hacia muchos funcionarios
     * @return type
     */
    public function funcionarios()
    {
        return $this->belongsToMany(Funcionario::class);
    }
}
