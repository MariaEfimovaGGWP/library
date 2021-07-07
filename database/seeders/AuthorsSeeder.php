<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = [
            [
                'name' => 'Джеймс Джойс',
            ],
            [
                'name' => 'Виктор Пелевин',
            ],
            [
                'name' => 'Кристофер Паолини',
            ],
            [
                'name' => 'Анджей Сапковский',
            ],
            [
                'name' => 'Владимир Набоков',
            ],
        ];

        foreach ($author as $data) {
            \App\Models\Author::create($data);
        }
    }
}
