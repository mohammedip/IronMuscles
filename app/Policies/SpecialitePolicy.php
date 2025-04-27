<?php

namespace App\Policies;

use App\Models\User;

class SpecialitePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('manage specialite');

    }

    public function create(User $user): bool
    {
        return $user->hasPermission('manage specialite');
    }

    public function update(User $user): bool
    {
        return $user->hasPermission('manage specialite');
    }

    public function delete(User $user): bool
    {
        return $user->hasPermission('manage specialite');
    }

    public function restore(User $user): bool
    {
        return $user->hasPermission('manage specialite');
    }
}
