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
            ['id' => 300, 'name' => 'images/places/300.jpg', 'type' => 'places',],

            ['id' => 301, 'name' => 'images/places-shows/301.jpg', 'type' => 'places-shows',],
            ['id' => 302, 'name' => 'images/places-shows/302.jpg', 'type' => 'places-shows',],
            ['id' => 303, 'name' => 'images/places-shows/303.jpg', 'type' => 'places-shows',],
            ['id' => 304, 'name' => 'images/places-shows/304.jpg', 'type' => 'places-shows',],


            ['id' => 2, 'name' => 'images/place-shows/2.jpg', 'type' => 'places-shows',],
            ['id' => 3, 'name' => 'images/place-shows/3.jpg', 'type' => 'places-shows',],
            ['id' => 4, 'name' => 'images/place-shows/4.jpg', 'type' => 'places-shows',],
            ['id' => 5, 'name' => 'images/place-shows/5.jpg', 'type' => 'places-shows',],
            ['id' => 6, 'name' => 'images/place-shows/6.jpg', 'type' => 'places-shows',],
            ['id' => 7, 'name' => 'images/place-shows/7.jpg', 'type' => 'places-shows',],
            ['id' => 8, 'name' => 'images/place-shows/8.jpg', 'type' => 'places-shows',],
            ['id' => 9, 'name' => 'images/place-shows/9.jpg', 'type' => 'places-shows',],
            ['id' => 10, 'name' => 'images/place-shows/10.jpg', 'type' => 'places-shows',],


            // ['id' => 3 ,'name' => 'images/provider-cover/1.jpg', 'type' => 'provider-cover',],
            // ['id' => 4 ,'name' => 'images/provider-shows/1.jpg' , 'type' => 'provider-shows' , ],

            // ['id' => 5 ,'name' => 'images/branch-shows/1.jpg', 'type' => 'branch-shows',],
            // ['id' => 6 ,'name' => 'images/branch-cover/1.jpg', 'type' => 'branch-cover',],                                            
        ];
        Image::insert($images);
    }
}
