<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'John Doe',
                'email' => 'john123_tyr@gmail.com',
                'password' => 'w456*(fsdfnkzzcbdfb',
            ],
            [
                'name' => 'Lara Kroft',
                'email' => 'laralara@gmail.com',
                'password' => 'w456*(fsdfnkzzcbdfb',
            ],
            [
                'name' => 'Alina Gingertale',
                'email' => 'rigehvost@gmail.com',
                'password' => 'w456*(fsdfnkzzcbdfb',
            ],
            [
                'name' => 'Head Shot',
                'email' => 'ggwpnp@gmail.com',
                'password' => 'w456*(fsdfnkzzcbdfb',
            ],
            [
                'name' => 'Kris Rote',
                'email' => 'andscarlett@gmail.com',
                'password' => 'w456*(fsdfnkzzcbdfb',
            ],
        ];

        foreach ($user as $data) {
            \App\Models\User::create($data);
        }
    }
}
