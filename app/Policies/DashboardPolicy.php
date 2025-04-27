<?php

namespace App\Policies;

use App\Models\User;

class DashboardPolicy
{
    public function access(User $user): bool
    {
        return $user->hasPermission('access dashboard');
    }
}
