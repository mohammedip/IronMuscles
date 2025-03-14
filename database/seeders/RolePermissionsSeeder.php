<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'add member', 'edit member', 'delete member', 'view members',
            
            'create subscription', 'edit subscription', 'delete subscription', 'view subscriptions', 'send subscription reminders',
            
            'track payments', 'record payment', 'view payment history', 'handle failed payments', 'make online payment',
            
            'schedule classes', 'view schedule', 'book classes', 'cancel classes', 'view workout stats',
            
            'manage equipment', 'track equipment status', 'receive maintenance alerts', 'view equipment guides',
            
            'manage trainers', 'schedule trainers', 'view trainers', 'book personal training', 'view trainer stats',
            
            'send targeted notifications', 'create announcements', 'view notification history',
            
            'manage roles and permissions', 'reset passwords', 'view security logs',
            
            'access homepage', 'view subscription plans', 'access contact page', 'manage own profile',
            
            'view dashboard', 'manage admin users', 'adjust system settings',
        ];

        foreach ($permissions as $permission) {
            // Permission::firstOrCreate(['name' => $permission]);
        }

        $roles_permissions = [
            'Admin' => [
                'add member', 'edit member', 'delete member', 'view members',
                'create subscription', 'edit subscription', 'delete subscription', 'view subscriptions', 'send subscription reminders',
                'track payments', 'record payment', 'view payment history', 'handle failed payments',
                'schedule classes', 'view schedule', 'view workout stats',
                'manage equipment', 'track equipment status', 'receive maintenance alerts',
                'manage trainers', 'schedule trainers', 'view trainers', 'view trainer stats',
                'send targeted notifications', 'create announcements', 'view notification history',
                'manage roles and permissions', 'reset passwords', 'view security logs',
                'view dashboard', 'manage admin users', 'adjust system settings',
            ],
            'Coach' => [
                'view schedule', 'book classes', 'view trainers', 'book personal training',
            ],
            'Adherent' => [
                'view subscriptions', 'make online payment', 'view payment history',
                'view schedule', 'book classes', 'cancel classes',
                'view equipment guides',
                'manage own profile',
                'access homepage', 'view subscription plans', 'access contact page',
            ],
        ];

        foreach ($roles_permissions as $role => $perms) {
            // $roleInstance = Role::firstOrCreate(['name' => $role]);
            // $roleInstance->syncPermissions($perms);
        }
    }
}
