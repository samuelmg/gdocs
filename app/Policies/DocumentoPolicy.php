<?php

namespace App\Policies;

use App\User;
use App\Documento;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create documentos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine cuando el usuario puede actualizar el documento.
     *
     * @param  \App\User  $user
     * @param  \App\Documento  $documento
     * @return mixed
     */
    public function update(User $user, Documento $documento)
    {
        return $user->id == $documento->user_id;
    }

    /**
     * Determina cuando un usuario puede eliminar el documento.
     *
     * @param  \App\User  $user
     * @param  \App\Documento  $documento
     * @return mixed
     */
    public function delete(User $user, Documento $documento)
    {
        return $user->rol == 'admin';
    }
}
