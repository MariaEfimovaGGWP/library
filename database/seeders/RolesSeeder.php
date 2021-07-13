<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
                'name' => 'admin'
            ],
            [
                'name' => 'manager'
            ],
            [
                'name' => 'reader'
            ],
            [
                'name' => 'privileged reader'
            ],
        ];

        foreach ($role as $data) {
           \Spatie\Permission\Models\Role::create($data);
        }
    }
}
