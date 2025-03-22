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
    {
        // Create roles if they don't exist
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $manager = Role::firstOrCreate(['name' => 'manager', 'guard_name' => 'web']);
        $receptionist = Role::firstOrCreate(['name' => 'receptionist', 'guard_name' => 'web']);

        // Create permissions if they don't exist
        $manageClients = Permission::firstOrCreate(['name' => 'manage clients', 'guard_name' => 'web']);
        $manageRooms = Permission::firstOrCreate(['name' => 'manage rooms', 'guard_name' => 'web']);
        $viewDashboard = Permission::firstOrCreate(['name' => 'view dashboard', 'guard_name' => 'web']);
        $manageManagers = Permission::firstOrCreate(['name' => 'manage managers', 'guard_name' => 'web']);
        $manageReceptionists = Permission::firstOrCreate(['name' => 'manage receptionists', 'guard_name' => 'web']);
        $manageFloors = Permission::firstOrCreate(['name' => 'manage floors', 'guard_name' => 'web']);
        $viewStatistics = Permission::firstOrCreate(['name' => 'view statistics', 'guard_name' => 'web']);

        // Assign permissions to roles
        $admin->syncPermissions(Permission::all()); // Admin gets all permissions
        $manager->syncPermissions([$viewDashboard, $manageReceptionists, $manageClients, $manageFloors, $manageRooms]);
        $receptionist->syncPermissions([$viewDashboard, $manageClients]);

        // Assign a role to the first user
        $user = User::first();
        if ($user) {
            $user->assignRole('admin');
        }
    }
}
