<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $managerRole = Role::create(['name' => 'manager']);
        $receptionistRole = Role::create(['name' => 'receptionist']);
        $permissions = [
            'view dashboard',
            'manage managers',
            'manage receptionists',
            'manage clients',
            'manage floors',
            'manage rooms',
            'view statistics',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assign all permissions to admin role
        $adminRole->givePermissionTo($permissions);

        // Assign specific permissions to roles
        $managerRole->givePermissionTo([
            'manage receptionists',
            'manage clients',
            'manage floors',
            'manage rooms'
        ]);
        $receptionistRole->givePermissionTo(['manage clients']);

        // Create an Admin user
        $admin = User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('123456'),
                'national_id' => '1234567890',
                'role' => 'admin',
                'avatar_image' => null,
                'manager_id' => null,
            ]
        );
        $admin->assignRole($adminRole); // Assign admin role to the user

        // Create a Receptionist user
        $receptionist = User::create([
            'name' => 'Receptionist 1',
            'email' => 'receptionist1@hotel.com',
            'password' => Hash::make('1234'),
            'role' => 'receptionist',
        ]);
        $receptionist->assignRole($receptionistRole); // Assign receptionist role to the user
    }
}
