<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::create(['name' => 'Admin']);
        $role_candidate = Role::create(['name' => 'Candidate']);
        $role_company = Role::create(['name' => 'Company']);
        $role_recruiter = Role::create(['name' => 'Recruiter']);
        $admin = Admin::find(1);
        $admin->assignRole($role_admin);

        $role_admin = Role::find(1);

        Permission::create(['name' => 'admin.index'])->assignRole($role_admin);

        Permission::create(['name' => 'permissions.index'])->assignRole($role_admin);
        Permission::create(['name' => 'permissions.create'])->assignRole($role_admin);
        Permission::create(['name' => 'permissions.store'])->assignRole($role_admin);
        Permission::create(['name' => 'permissions.show'])->assignRole($role_admin);
        Permission::create(['name' => 'permissions.edit'])->assignRole($role_admin);
        Permission::create(['name' => 'permissions.update'])->assignRole($role_admin);
        Permission::create(['name' => 'permissions.destroy'])->assignRole($role_admin);

        Permission::create(['name' => 'roles.index'])->assignRole($role_admin);
        Permission::create(['name' => 'roles.create'])->assignRole($role_admin);
        Permission::create(['name' => 'roles.store'])->assignRole($role_admin);
        Permission::create(['name' => 'roles.show'])->assignRole($role_admin);
        Permission::create(['name' => 'roles.edit'])->assignRole($role_admin);
        Permission::create(['name' => 'roles.update'])->assignRole($role_admin);
        Permission::create(['name' => 'roles.destroy'])->assignRole($role_admin);

        Permission::create(['name' => 'login.candidate'])->assignRole($role_candidate);
        // $role_candidate->givePermissionTo('login.candidate');
        //  $candidate = Candidate::find(1);
        //  $candidate->assignRole($role_candidate);

    }
}
