<?php

namespace App\Policies;

use App\Models\KasabianKoleksiPribadi;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class KasabianKoleksiPribadiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, KasabianKoleksiPribadi $kasabianKoleksiPribadi): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, KasabianKoleksiPribadi $kasabianKoleksiPribadi): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, KasabianKoleksiPribadi $kasabianKoleksiPribadi): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, KasabianKoleksiPribadi $kasabianKoleksiPribadi): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, KasabianKoleksiPribadi $kasabianKoleksiPribadi): bool
    {
        return false;
    }
}
