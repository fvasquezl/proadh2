<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Admin'))
        {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Car  $car
     * @return mixed
     */
    public function view(User $user, Car $car)
    {
        return $user->id === $car->user_id
            || $user->hasPermissionTo('View cars');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Create cars');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Car  $car
     * @return mixed
     */
    public function update(User $user, Car $car)
    {
        return $user->id === $car->user_id
            || $user->hasPermissionTo('Update cars');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Car  $car
     * @return mixed
     */
    public function delete(User $user, Car $car)
    {
        return $user->id === $car->user_id
            || $user->hasPermissionTo('Delete cars');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Car  $car
     * @return mixed
     */
    public function restore(User $user, Car $car)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Car  $car
     * @return mixed
     */
    public function forceDelete(User $user, Car $car)
    {
        //
    }
}
