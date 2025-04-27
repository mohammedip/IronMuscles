<?php

namespace App\Policies;

use App\Models\User;

class AbonnementPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('manage abonnement');
    }

    public function update(User $user): bool
    {
        return $user->hasPermission('manage abonnement');
    }

    public function delete(User $user): bool
    {
        return $user->hasPermission('manage abonnement');
    }

    public function restore(User $user): bool
    {
        return $user->hasPermission('manage abonnement');
    }
}
