<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user,$ability)
    {
        /*
        Este metodo se ejecuta antes que cualquier validacion
        de retornan verdadero ya no se valida nada
        en este caso si el usuario autenticado es administrador, ya no se valida nada
        if ($user->hasRoles(['admin'])) {
            return true;
        }
        */
        if ($user->isAdmin()) 
        {
            return true;
        }
    }
    /*
        Se deben replicar los metodos quer se quieran validar en el controller
        en el controler se manda la validacion, dentro del metodo con la instruccion "$this->authorize('edit',$user);"
        en este caso se interpreta que el usuario enviado por el controller es el usuario a editar
        el metodo del policy cuenta por default con el usuario autenticado.
    */
    public function edit(User $authUser,User $user)
    {
        //dd($authUser->id);
        //return '1' === '2';
        return $authUser->id === $user->id;
    }

    public function update(User $authUser,User $user)
    {
        return $authUser->id === $user->id;
    }

    public function destroy(User $authUser,User $user)
    {
        return $authUser->id === $user->id;
    }


}
