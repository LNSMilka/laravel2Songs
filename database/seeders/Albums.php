<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Albums extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('albums')->insert([
            [
                'name' => 'A Night at the Opera',
                'year' => 1975,
                'times_sold' => 11000000,
                'band_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Back in Black',
                'year' => 1980,
                'times_sold' => 50000000,
                'band_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'highway to hell',
                'year' => 1979,
                'times_sold' => 7000000,
                'band_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Master of puppets',
                'year' => 1986,
                'times_sold' => 21000000,
                'band_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ride the Lightning',
                'year' => 1984,
                'times_sold' => 5000000,
                'band_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ]]);
    }
}
