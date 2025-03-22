<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
<<<<<<< HEAD
    {
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $manager = Role::firstOrCreate(['name' => 'manager']);
        $receptionist = Role::firstOrCreate(['name' => 'receptionist']);

        $manageClients = Permission::firstOrCreate(['name' => 'manage clients']);
        $manageRooms = Permission::firstOrCreate(['name' => 'manage rooms']);

        // Assign permissions to roles
        $admin->givePermissionTo([$manageClients, $manageRooms]);
        $manager->givePermissionTo($manageClients);

        // Assign a role to a test user
        $user = User::first(); // Replace with a specific user if needed
        if ($user) {
            $user->assignRole('admin'); // Assigns all admin permissions
        }
    }
}
=======
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
>>>>>>> c249f7927bcd1c14590fe12e06622c4db3fad1cf
