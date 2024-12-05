<?php

namespace Database\Seeders;

use App\Logic\PermissionHelper;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::updateOrCreate(
            [
                'guard_name'=>PermissionHelper::PERMISSION_UPLOAD_DATASETS
            ],
            [
                'name'=>'Upload Datasets',
                'guard_name'=>PermissionHelper::PERMISSION_UPLOAD_DATASETS
            ]
        );

        Permission::updateOrCreate(
            [
                'guard_name'=>PermissionHelper::PERMISSION_MANAGE_SCENARIOS
            ],
            [
                'name'=>'Manage scenarios',
                'guard_name'=>PermissionHelper::PERMISSION_MANAGE_SCENARIOS
            ]
        );

        Permission::updateOrCreate(
            [
                'guard_name'=>PermissionHelper::PERMISSION_MANAGE_ASSESSMENTOOLS
            ],
            [
                'name'=>'Manage assessment tools',
                'guard_name'=>PermissionHelper::PERMISSION_MANAGE_ASSESSMENTOOLS
            ]
        );

        Permission::updateOrCreate(
            [
                'guard_name'=>PermissionHelper::PERMISSION_ADMIN_PERMISSIONS
            ],
            [
                'name'=>'Admin permissions',
                'guard_name'=>PermissionHelper::PERMISSION_ADMIN_PERMISSIONS
            ]
        );
    }
}
