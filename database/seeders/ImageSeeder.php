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
            
            ['id' => 2 ,'name' => 'images/places-shows/1.jpg', 'type' => 'places-shows',],
            
            ['id' => 3 ,'name' => 'images/provider-cover/1.jpg', 'type' => 'provider-cover',],
            ['id' => 4 ,'name' => 'images/provider-shows/1.jpg' , 'type' => 'provider-shows' , ],

            ['id' => 5 ,'name' => 'images/branch-shows/1.jpg', 'type' => 'branch-shows',],
            ['id' => 6 ,'name' => 'images/branch-cover/1.jpg', 'type' => 'branch-cover',],                                            
        ];
        Image::insert($images);
    }
}
