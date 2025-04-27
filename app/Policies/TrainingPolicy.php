<?php

namespace App\Policies;

use App\Models\User;

class TrainingPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('manage trainings');
    }

    public function view(User $user): bool
    {
        return $user->hasPermission('manage planning');
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('manage trainings');
    }

    public function update(User $user): bool
    {
        return $user->hasPermission('manage trainings');
    }

    public function delete(User $user): bool
    {
        return $user->hasPermission('manage trainings');
    }

    public function restore(User $user): bool
    {
        return $user->hasPermission('manage trainings');
    }
}
