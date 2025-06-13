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
            ['id' => 1 ,'name' => 'images/places/1.jpg', 'type' => 'places',],
            ['id' => 11 ,'name' => 'images/places/11.jpg', 'type' => 'places',],
            

            ['id' => 2 ,'name' => 'images/place-shows/2.jpg', 'type' => 'places-shows',],
            ['id' => 3 ,'name' => 'images/place-shows/3.jpg', 'type' => 'places-shows',],
            ['id' => 4 ,'name' => 'images/place-shows/4.jpg', 'type' => 'places-shows',],
            ['id' => 5 ,'name' => 'images/place-shows/5.jpg', 'type' => 'places-shows',],
            ['id' => 6 ,'name' => 'images/place-shows/6.jpg', 'type' => 'places-shows',],
            ['id' => 7 ,'name' => 'images/place-shows/7.jpg', 'type' => 'places-shows',],
            ['id' => 8 ,'name' => 'images/place-shows/8.jpg', 'type' => 'places-shows',],
            ['id' => 9 ,'name' => 'images/place-shows/9.jpg', 'type' => 'places-shows',],
            ['id' => 10 ,'name' => 'images/place-shows/10.jpg', 'type' => 'places-shows',],
            
            ['id' => 12 ,'name' => 'images/place-shows/12.jpg', 'type' => 'places-shows',],
            ['id' => 13 ,'name' => 'images/place-shows/13.jpg', 'type' => 'places-shows',],
            ['id' => 14 ,'name' => 'images/place-shows/14.jpg', 'type' => 'places-shows',],
            ['id' => 15 ,'name' => 'images/place-shows/15.jpg', 'type' => 'places-shows',],
            ['id' => 16 ,'name' => 'images/place-shows/16.jpg', 'type' => 'places-shows',],
            ['id' => 17 ,'name' => 'images/place-shows/17.jpg', 'type' => 'places-shows',],

            
            // ['id' => 3 ,'name' => 'images/provider-cover/1.jpg', 'type' => 'provider-cover',],
            // ['id' => 4 ,'name' => 'images/provider-shows/1.jpg' , 'type' => 'provider-shows' , ],

            // ['id' => 5 ,'name' => 'images/branch-shows/1.jpg', 'type' => 'branch-shows',],
            // ['id' => 6 ,'name' => 'images/branch-cover/1.jpg', 'type' => 'branch-cover',],                                            
        ];
        Image::insert($images);
    }
}
