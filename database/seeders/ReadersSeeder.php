<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReadersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reader = [
            [
                'user_id' => '1',
                'book_id' => '1',
            ],
            [
                'user_id' => '1',
                'book_id' => '4',
            ],
            [
                'user_id' => '2',
                'book_id' => '5',
            ],
            [
                'user_id' => '3',
                'book_id' => '1',
            ],
            [
                'user_id' => '3',
                'book_id' => '4',
            ],
            [
                'user_id' => '3',
                'book_id' => '2',
            ],
        ];

        foreach ($reader as $data) {
            \App\Models\Reader::create($data);
        }
    }
}
