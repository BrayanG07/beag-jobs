<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacant;
use Illuminate\Auth\Access\Response;

class VacantPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->rol === 2; // 2 = reclutador, solo el reclutador puede acceder a este recurso
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Vacant $vacant): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->rol === 2; // 2 = reclutador, solo el reclutador puede acceder a este recurso
    }

    /**
     * Determina si el usuario puede actualizar el modelo.
     * Un usuario solo puede actualizar una vacante si él es el creador de la misma.
     */
    public function update(User $user, Vacant $vacant): bool
    {
        return $user->id === $vacant->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vacant $vacant): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vacant $vacant): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vacant $vacant): bool
    {
        return true;
    }
}
