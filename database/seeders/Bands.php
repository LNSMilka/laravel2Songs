<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Bands extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bands')->insert([
            [
                'name' => 'AC/DC',
                'genre' => 'hard rock',
                'founded' => '1973',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Metallica',
                'genre' => 'heavy metal',
                'founded' => '1981',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'queen',
                'genre' => 'rock pop',
                'founded' => '1970',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
