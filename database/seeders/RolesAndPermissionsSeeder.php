<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // List of entities to create permissions for
        $entities = [
            'brand',
            'category',
            'order',
            'product',
            'product_image',
            'product_review',
            'user',
            'permission',
            'role',
            'promo_code',
            'stock'
        ];

        // List of roles to create
        $roles = ['user', 'seller', 'admin'];

        // List of permissions to create for each role
        $permissions = [
            'seller' => [
                'order' => ['view', 'update'], 
                'stock' => ['view', 'update']
            ],
        ];

        foreach ($roles as $roleName) {
            $role = Role::create(['name' => $roleName]);

            if (isset($permissions[$roleName])) {
                foreach ($permissions[$roleName] as $entity => $actions) {
                    foreach ($actions as $action) {
                        $permissionName = "{$entity}.{$action}";
                        $permission = Permission::firstOrCreate(['name' => $permissionName]);
                        $role->givePermissionTo($permission);
                    }
                }
            }

            // Admin has all permissions
            if ($roleName === 'admin') {
                foreach ($entities as $entity) {
                    foreach (['view', 'create', 'update', 'delete'] as $action) {
                        $permissionName = "{$entity}.{$action}";
                        $permission = Permission::firstOrCreate(['name' => $permissionName]);
                        $role->givePermissionTo($permission);
                    }
                }
            }
        }
    }
}
