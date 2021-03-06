<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AuthorsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(BooksSeeder::class);
        $this->call(ReadersSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(PermissionsSeeder::class);
    }
}
