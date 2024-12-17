<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Categori;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoriPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_categori');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Categori $categori): bool
    {
        return $user->can('view_categori');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_categori');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Categori $categori): bool
    {
        return $user->can('update_categori');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Categori $categori): bool
    {
        return $user->can('delete_categori');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_categori');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Categori $categori): bool
    {
        return $user->can('force_delete_categori');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_categori');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Categori $categori): bool
    {
        return $user->can('restore_categori');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_categori');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Categori $categori): bool
    {
        return $user->can('replicate_categori');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_categori');
    }
}
