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
    {
       $admin= Role::firstOrCreate(['name' => 'admin']);
       $manager= Role::firstOrCreate(['name' => 'manager']);
       $receptionist= Role::firstOrCreate(['name' => 'receptionist']);

        $manageClients = Permission::create(['name' => 'manage clients']);
        $manageRooms = Permission::create(['name' => 'manage rooms']);

        // Assign permissions to roles
        $admin->givePermissionTo($manageClients);
        $admin->givePermissionTo($manageRooms);
        $manager->givePermissionTo($manageClients);
    }
}
