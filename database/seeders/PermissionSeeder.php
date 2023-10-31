<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.store']);
        Permission::create(['name' => 'users.destroy']);
        Permission::create(['name' => 'users.change_role']);

        Permission::create(['name' => 'log-viewer']);

        Permission::create(['name' => 'hosting-types.index']);
        Permission::create(['name' => 'hosting-types.manage']);

        Permission::create(['name' => 'hosting.index']);
        Permission::create(['name' => 'hosting.manage']);
        Permission::create(['name' => 'hosting.create']);
        Permission::create(['name' => 'hosting.update']);
        Permission::create(['name' => 'hosting.restore']);
        Permission::create(['name' => 'hosting.delete']);

        Permission::create(['name' => 'ticket-status.index']);
        Permission::create(['name' => 'ticket-status.manage']);

        Permission::create(['name' => 'ticket.index']);
        Permission::create(['name' => 'ticket.manage']);

        $adminRole = Role::findByName(config('auth.roles.admin'));
        $adminRole->givePermissionTo('users.index');
        $adminRole->givePermissionTo('users.store');
        $adminRole->givePermissionTo('users.destroy');
        $adminRole->givePermissionTo('users.change_role');

        $adminRole->givePermissionTo('log-viewer');

        $adminRole->givePermissionTo('hosting-types.index');
        $adminRole->givePermissionTo('hosting-types.manage');

        $adminRole->givePermissionTo('hosting.index');
        $adminRole->givePermissionTo('hosting.manage');
        $adminRole->givePermissionTo('hosting.create');
        $adminRole->givePermissionTo('hosting.update');
        $adminRole->givePermissionTo('hosting.restore');
        $adminRole->givePermissionTo('hosting.delete');

        $adminRole->givePermissionTo('ticket-status.index');
        $adminRole->givePermissionTo('ticket-status.manage');

        $adminRole->givePermissionTo('ticket.index');
        $adminRole->givePermissionTo('ticket.manage');

        $serviceRole = Role::findByName(config('auth.roles.service'));
        $serviceRole->givePermissionTo('hosting-types.index');
        $serviceRole->givePermissionTo('hosting.index');
        $serviceRole->givePermissionTo('ticket-status.index');
        $serviceRole->givePermissionTo('ticket.index');

        $userRole = Role::findByName(config('auth.roles.user'));
        $userRole->givePermissionTo('hosting-types.index');
        $userRole->givePermissionTo('hosting.index');
        $userRole->givePermissionTo('ticket-status.index');
        $userRole->givePermissionTo('ticket.index');
    }
}
