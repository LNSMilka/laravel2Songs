<?php

namespace Database\Seeders;

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
                'name' => 'Queen',
                'genre' => 'Rock',
                'founded' => 1970,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'AC/DC',
                'genre' => 'Hard Rock',
                'founded' => 1973,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Metallica',
                'genre' => 'Heavy Metal',
                'founded' => 1981,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
