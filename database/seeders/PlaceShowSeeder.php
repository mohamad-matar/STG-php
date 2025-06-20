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
            [
                'name_ar' => '',
                'name_en' => '',                   
                'place_id' => 11,
                'image_id' => 12,                
            ],
            [
                'name_ar' => '',
                'name_en' => '',                   
                'place_id' => 11,
                'image_id' => 13,                
            ],
            [
                'name_ar' => '',
                'name_en' => '',                   
                'place_id' => 11,
                'image_id' => 14,                
            ],
            [
                'name_ar' => '',
                'name_en' => '',                   
                'place_id' => 11,
                'image_id' => 15,                
            ],
            [
                'name_ar' => '',
                'name_en' => '',                   
                'place_id' => 11,
                'image_id' => 16,                
            ],
            [
                'name_ar' => '',
                'name_en' => '',                   
                'place_id' => 11,
                'image_id' => 17,                
            ],
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
