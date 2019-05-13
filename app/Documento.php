<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
    use SoftDeletes;
    //protected $fillable = ['envia', 'no_oficio', 'fecha_oficio', 'recibido'];
    protected $guarded = ['id'];
    protected $dates = ['fecha_oficio', 'created_at', 'updated_at', 'deleted_at'];

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

    /**
     * Relación polimórfica hacia muchos archivos
     * @return type
     */
    public function archivos()
    {
        return $this->morphMany('App\Archivo', 'modelo');
    }

    /**
     * Guarda el número de oficio en mayúsculas.
     * @param string $no_oficio
     * @return void
     */
    public function setNoOficioAttribute($no_oficio)
    {
        $this->attributes['no_oficio'] = strtoupper($no_oficio);
    }
}
