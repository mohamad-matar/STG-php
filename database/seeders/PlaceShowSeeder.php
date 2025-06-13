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
                'place_id' => 1,
                'image_id' => 2,                
            ],
            [
                'name_ar' => '',
                'name_en' => '',                   
                'place_id' => 1,
                'image_id' => 3,                
            ],
            [
                'name_ar' => '',
                'name_en' => '',                   
                'place_id' => 1,
                'image_id' => 4,                
            ],
            [
                'name_ar' => '',
                'name_en' => '',                   
                'place_id' => 1,
                'image_id' => 5,                
            ],
            [
                'name_ar' => '',
                'name_en' => '',                   
                'place_id' => 1,
                'image_id' => 6,                
            ],
            [
                'name_ar' => '',
                'name_en' => '',                   
                'place_id' => 1,
                'image_id' => 7,                
            ],
            [
                'name_ar' => '',
                'name_en' => '',                   
                'place_id' => 1,
                'image_id' => 8,                
            ],
            [
                'name_ar' => '',
                'name_en' => '',                   
                'place_id' => 1,
                'image_id' => 9,                
            ],
            [
                'name_ar' => '',
                'name_en' => '',                   
                'place_id' => 1,
                'image_id' => 10,                
            ],
           
        ];
        PlaceShow::insert($placeShows);
    }
}
