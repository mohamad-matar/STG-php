<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $placeShows = [
            [
                'id' => 1,
                'name_ar' => 'الساحة',
                'name_en' => 'square',                
                'place_id' => 1,
                'image_id' => 1,                
            ],
        ];
    }
}
