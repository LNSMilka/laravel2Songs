<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'title' => "Fe1n",
                'singer' => "Jacques Bermon Webster II",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => "Father stretch my hands",
                'singer' => "Kanye West",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => "bumph heads",
                'singer' => "Eminem",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => "Surround sound",
                'singer' => "JID",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => "DNA.",
                'singer' => "Kendrick Lamar",
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
