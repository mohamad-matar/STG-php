<?php

namespace Database\Seeders;

use App\Models\PlaceShow;
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
                'name_ar' => '',
                'name_en' => '',                   
                'place_id' => 300,
                'image_id' => 301,                
            ],
            [
                'name_ar' => '',
                'name_en' => '',                   
                'place_id' => 300,
                'image_id' => 302,                
            ],
            [
                'name_ar' => '',
                'name_en' => '',                   
                'place_id' => 300,
                'image_id' => 303,                
            ],
            [
                'name_ar' => '',
                'name_en' => '',                   
                'place_id' => 300,
                'image_id' => 304,                
            ],
        ];
        PlaceShow::insert($placeShows);
    }
}
