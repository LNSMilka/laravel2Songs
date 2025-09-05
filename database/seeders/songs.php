<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class songs extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('songs')->insert([
            [
                'title' => 'Bohemian Rhapsody',
                'singer' => 'Queen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Back in Black',
                'singer' => 'AC/DC',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Highway to Hell',
                'singer' => 'AC/DC',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Master of Puppets',
                'singer' => 'Metallica',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Enter Sandman',
                'singer' => 'Metallica',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
