<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            ['id' => 100 ,'name' => 'images/places/100.jpg', 'type' => 'places',],

            ['id' => 101 ,'name' => 'images/place-shows/101.jpg', 'type' => 'place-shows',],
            ['id' => 102,'name' => 'images/place-shows/102.jpg', 'type' => 'place-shows',],
            ['id' => 103,'name' => 'images/place-shows/103.jpg', 'type' => 'place-shows',],
            ['id' => 104,'name' => 'images/place-shows/104.jpg', 'type' => 'place-shows',],
            ['id' => 105,'name' => 'images/place-shows/105.jpg', 'type' => 'place-shows',],
            ['id' => 106,'name' => 'images/place-shows/106.jpg', 'type' => 'place-shows',],
            ['id' => 107,'name' => 'images/place-shows/107.jpg', 'type' => 'place-shows',],
            ['id' => 108,'name' => 'images/place-shows/108.jpg', 'type' => 'place-shows',],
            ['id' => 109 ,'name' => 'images/place-shows/109.jpg', 'type' => 'place-shows',],
        ];
            
        //     ['id' => 3 ,'name' => 'images/provider-cover/1.jpg', 'type' => 'provider-cover',],
        //     ['id' => 4 ,'name' => 'images/provider-shows/1.jpg' , 'type' => 'provider-shows' , ],

        //     ['id' => 5 ,'name' => 'images/branch-shows/1.jpg', 'type' => 'branch-shows',],
        //     ['id' => 6 ,'name' => 'images/branch-cover/1.jpg', 'type' => 'branch-cover',],                                            
        // ];
        Image::insert($images);
    }
}
