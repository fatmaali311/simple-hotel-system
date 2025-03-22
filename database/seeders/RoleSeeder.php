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
