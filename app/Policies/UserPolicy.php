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
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $authUser
     * @param User $user
     * @return mixed
     */
    public function view(User $authUser, User $user)
    {
        return $authUser->id === $user->id
            || $user->hasPermissionTo('View users');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Create users');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $authUser
     * @param User $user
     * @return mixed
     */
    public function update(User $authUser, User $user)
    {
        return $authUser->id === $user->id
            || $user->hasPermissionTo('Update users');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $authUser
     * @param User $user
     * @return mixed
     */
    public function delete(User $authUser, User $user)
    {
        return $authUser->id === $user->id
            || $user->hasPermissionTo('Delete users');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $authUser
     * @param User $user
     * @return mixed
     */
    public function restore(User $authUser, User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $authUser
     * @param User $user
     * @return mixed
     */
    public function forceDelete(User $authUser, User $user)
    {
        //
    }
}
