<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();
        $permissions = [
            'view-staff',
            'add-staff',
            'edit-staff',
            'delete-staff',
            'ajax-staff',

            'view-pages',
            'add-pages',
            'edit-pages',
            'delete-pages',
            'ajax-pages',

            'view-users',
            'add-users',
            'edit-users',
            'delete-users',
            'ajax-users',

            'view-roles',
            'add-roles',
            'edit-roles',
            'delete-roles',
            'ajax-roles',

            'view-advertisements',
            'add-advertisements',
            'edit-advertisements',
            'delete-advertisements',
            'ajax-advertisements',

            'view-attachments',
            'add-attachments',
            'edit-attachments',
            'delete-attachments',
            'ajax-attachments',

            'view-services',
            'add-services',
            'edit-services',
            'delete-services',
            'ajax-services',

            'view-threads',
            'add-threads',
            'edit-threads',
            'delete-threads',
            'ajax-threads',

            'view-withdraws',
            'add-withdraws',
            'edit-withdraws',
            'delete-withdraws',
            'ajax-withdraws',

            'view-settings',
            'add-settings',
            'edit-settings',
            'delete-settings',
            'ajax-settings',

            'view-products',
            'add-products',
            'edit-products',
            'delete-products',
            'ajax-products',

            'view-sections',
            'add-sections',
            'edit-sections',
            'delete-sections',
            'ajax-sections',

            'view-orders',
            'add-orders',
            'edit-orders',
            'delete-orders',
            'ajax-orders',

            'view-complaints',
            'add-complaints',
            'edit-complaints',
            'delete-complaints',
            'ajax-complaints',

            'view-deposits',
            'add-deposits',
            'edit-deposits',
            'delete-deposits',
            'ajax-deposits',

            'view-newsletters',
            'add-newsletters',
            'edit-newsletters',
            'delete-newsletters',
            'ajax-newsletters',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'staff']);
        }
    }
}
