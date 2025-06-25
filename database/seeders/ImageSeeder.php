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
            ['id' => 200 ,'name' => 'images/places/200.jpg', 'type' => 'places',],

            ['id' => 201 ,'name' => 'images/place-shows/201.jpg', 'type' => 'place-shows',],
            ['id' => 202 ,'name' => 'images/place-shows/202.jpg', 'type' => 'places-show',],
            ['id' => 203 ,'name' => 'images/place-shows/203.jpg', 'type' => 'places-show',],
            ['id' => 204 ,'name' => 'images/place-shows/204.jpg', 'type' => 'places-show',],
            ['id' => 205 ,'name' => 'images/place-shows/205.jpg', 'type' => 'places-show',],
            ['id' => 206 ,'name' => 'images/place-shows/206.jpg', 'type' => 'places-show',],
            ['id' => 207 ,'name' => 'images/place-shows/207.jpg', 'type' => 'places-show',],
            ['id' => 208 ,'name' => 'images/place-shows/208.jpg', 'type' => 'places-show',],
            ['id' => 209 ,'name' => 'images/place-shows/209.jpg', 'type' => 'places-show',],
            ['id' => 210 ,'name' => 'images/place-shows/210.jpg', 'type' => 'places-show',],
            ['id' => 211 ,'name' => 'images/place-shows/211.jpg', 'type' => 'places-show',],
            ['id' => 212 ,'name' => 'images/place-shows/212.jpg', 'type' => 'places-show',],
            ['id' => 213 ,'name' => 'images/place-shows/213.jpg', 'type' => 'places-show',],


            ['id' => 215 ,'name' => 'images/places/215.jpg', 'type' => 'places',],
            ['id' => 216 ,'name' => 'images/place-shows/216.jpg', 'type' => 'places-show',],
             ['id' => 217 ,'name' =>'images/place-shows/217.jpg', 'type' => 'places-show',],

            // ['id' => 3 ,'name' => 'images/provider-cover/1.jpg', 'type' => 'provider-cover',],
            // ['id' => 4 ,'name' => 'images/provider-shows/1.jpg' , 'type' => 'provider-shows' , ],

            // ['id' => 5 ,'name' => 'images/branch-shows/1.jpg', 'type' => 'branch-shows',],
            // ['id' => 6 ,'name' => 'images/branch-cover/1.jpg', 'type' => 'branch-cover',],                                            
        ];
        Image::insert($images);
    }
}