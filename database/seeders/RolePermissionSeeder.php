<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    $admin = Role::create(['name' => 'admin']);
    $coach = Role::create(['name' => 'coach']);
    Role::create(['name' => 'adherent']);


    $manageUsers = Permission::create(['name' => 'manage users']);
    $managePayments = Permission::create(['name' => 'manage payments']);
    $manageTrainings = Permission::create(['name' => 'manage trainings']);


    $admin->permissions()->attach([$manageUsers->id, $managePayments->id, $manageTrainings->id]);
    $coach->permissions()->attach([$manageTrainings->id]);


    }
}
