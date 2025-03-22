<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { // Create roles if they don't exist
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $managerRole = Role::firstOrCreate(['name' => 'manager', 'guard_name' => 'web']);
        $receptionistRole = Role::firstOrCreate(['name' => 'receptionist', 'guard_name' => 'web']);

        // Create permissions if they don't exist
        Permission::firstOrCreate(['name' => 'view dashboard', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'manage managers', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'manage receptionists', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'manage clients', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'manage floors', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'manage rooms', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'view statistics', 'guard_name' => 'web']);

        // Assign permissions to roles
        $adminRole->syncPermissions(Permission::all()); // Admin gets all permissions
        $managerRole->syncPermissions(['view dashboard', 'manage receptionists', 'manage clients', 'manage floors', 'manage rooms']);
        $receptionistRole->syncPermissions(['view dashboard', 'manage clients']);
}}
