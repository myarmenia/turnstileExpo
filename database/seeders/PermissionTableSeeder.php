<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'press-release-list',
            'press-release-create',
            'press-release-edit',
            'press-release-delete',

            'press-release-video',

            'current-earthquake-list',
            'current-earthquake-create',
            'current-earthquake-edit',
            'current-earthquake-delete',

            'news-list',
            'news-create',
            'news-edit',
            'news-delete',

            'regional-monitoring',

            'feedback-list',
            'feedback-read',
            'feedback-edit',
            'feedback-delete',

            'global-monitoring-list',
            'global-monitoring-edit',
            
            'contact-info',
            'banner-list',
            'banner-edit'
        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
