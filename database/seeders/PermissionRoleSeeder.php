<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRoleSeeder extends Seeder
{
    public function run(): void
    {
        // create permission
        Permission::create(['name' => 'use_repository']);
        Permission::create(['name' => 'use_endpoint']);
        Permission::create(['name' => 'use_jobs']);

        // Create roles
        $admin = Role::create(['name' => 'Super-Admin']);
        $user = Role::create(['name' => 'user']);
        $member = Role::create(['name' => 'member']);

        // Assign permissions to roles
        $user->givePermissionTo(['use_repository', 'use_endpoint', 'use_jobs']);
        $member->givePermissionTo(['use_repository', 'use_endpoint', 'use_jobs']);

        // Assign role Super-Admin to first user
        $userAdmin = User::find(1)->assignRole($admin);
    }
}
