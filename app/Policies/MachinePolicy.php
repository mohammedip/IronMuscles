<?php

namespace App\Policies;

use App\Models\User;

class MachinePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('manage machine');
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('manage machine');
    }

    public function update(User $user): bool
    {
        return $user->hasPermission('manage machine');
    }

    public function delete(User $user): bool
    {
        return $user->hasPermission('manage machine');
    }

    public function restore(User $user): bool
    {
        return $user->hasPermission('manage machine');
    }
}
