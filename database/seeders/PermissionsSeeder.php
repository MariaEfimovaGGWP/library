<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class PermissionsSeeder extends Seeder
{
    use HasRoles;
    public function run()
    {
        $roles = \Spatie\Permission\Models\Role::all();


        $permission = [
            [
                '0' => [
                    'name' => 'add new book',
                ],
                '1' => [
                    'roles' => [
                        'admin',
                        'manager',
                    ]
                ]

            ],
            [
                '0' => [
                    'name' => 'edit book',
                ],
                '1' => [
                    'roles' => [
                        'admin',
                        'manager',
                        'privileged reader',
                    ]
                ],
            ],
        ];

        foreach ($permission as $data) {
            $perm = \Spatie\Permission\Models\Permission::create($data['0']);

            // foreach ($data['1']['roles'] as $role) {
            //     $perm = \Spatie\Permission\Models\Permission::where(['name', '=', $data['0']['name']]);
            //     $rolee = \Spatie\Permission\Models\Role::where(['name', '=', $role]);
            //     $rolee->givePermissionTo($perm);
            // };
        }
    }
}
