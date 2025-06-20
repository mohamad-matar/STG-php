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
                'place_id' => 100,
                'image_id' => 101,                
            ],
            [
              
                'name_ar' => '',
                'name_en' => '',                
                'place_id' => 100,
                'image_id' => 102,                
            ],
            [
              
                'name_ar' => '',
                'name_en' => '',                
                'place_id' => 100,
                'image_id' => 103,                
            ],
            [
              
                'name_ar' => '',
                'name_en' => '',                
                'place_id' => 100,
                'image_id' => 104,                
            ],
            [
              
                'name_ar' => '',
                'name_en' => '',                
                'place_id' => 100,
                'image_id' => 105,                
            ],
            [
              
                'name_ar' => '',
                'name_en' => '',                
                'place_id' => 100,
                'image_id' => 106,                
            ],
            [
              
                'name_ar' => '',
                'name_en' => '',                
                'place_id' => 100,
                'image_id' => 107,                
            ],
            [
              
                'name_ar' => '',
                'name_en' => '',                
                'place_id' => 100,
                'image_id' => 108,                
            ],
            [
              
                'name_ar' => '',
                'name_en' => '',                
                'place_id' => 100,
                'image_id' => 109       ,                
            ], 
        ];
        PlaceShow::insert($placeShows);
    }
}
