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



            ['id' => 1, 'name' => 'images/places/1.jpg', 'type' => 'places',],

            ['id' => 2, 'name' => 'images/place-shows/2.jpg', 'type' => 'places-shows',],
            ['id' => 3, 'name' => 'images/place-shows/3.jpg', 'type' => 'places-shows',],
            ['id' => 4, 'name' => 'images/place-shows/4.jpg', 'type' => 'places-shows',],
            ['id' => 5, 'name' => 'images/place-shows/5.jpg', 'type' => 'places-shows',],
            ['id' => 6, 'name' => 'images/place-shows/6.jpg', 'type' => 'places-shows',],
            ['id' => 7, 'name' => 'images/place-shows/7.jpg', 'type' => 'places-shows',],
            ['id' => 8, 'name' => 'images/place-shows/8.jpg', 'type' => 'places-shows',],
            ['id' => 9, 'name' => 'images/place-shows/9.jpg', 'type' => 'places-shows',],
            ['id' => 10, 'name' => 'images/place-shows/10.jpg', 'type' => 'places-shows',],

            ['id' => 11, 'name' => 'images/places/11.jpg', 'type' => 'places',],

            ['id' => 12, 'name' => 'images/place-shows/12.jpg', 'type' => 'places-shows',],
            ['id' => 13, 'name' => 'images/place-shows/13.jpg', 'type' => 'places-shows',],
            ['id' => 14, 'name' => 'images/place-shows/14.jpg', 'type' => 'places-shows',],
            ['id' => 15, 'name' => 'images/place-shows/15.jpg', 'type' => 'places-shows',],
            ['id' => 16, 'name' => 'images/place-shows/16.jpg', 'type' => 'places-shows',],
            ['id' => 17, 'name' => 'images/place-shows/17.jpg', 'type' => 'places-shows',],


            ['id' => 100, 'name' => 'images/places/100.jpg', 'type' => 'places',],

           
            






            ['id' => 101, 'name' => 'images/place-shows/101.jpg', 'type' => 'place-shows',],
            ['id' => 102, 'name' => 'images/place-shows/102.jpg', 'type' => 'place-shows',],
            ['id' => 103, 'name' => 'images/place-shows/103.jpg', 'type' => 'place-shows',],
            ['id' => 104, 'name' => 'images/place-shows/104.jpg', 'type' => 'place-shows',],
            ['id' => 105, 'name' => 'images/place-shows/105.jpg', 'type' => 'place-shows',],
            ['id' => 106, 'name' => 'images/place-shows/106.jpg', 'type' => 'place-shows',],
            ['id' => 107, 'name' => 'images/place-shows/107.jpg', 'type' => 'place-shows',],
            ['id' => 108, 'name' => 'images/place-shows/108.jpg', 'type' => 'place-shows',],
            ['id' => 109, 'name' => 'images/place-shows/109.jpg', 'type' => 'place-shows',],

            ['id' => 1000, 'name' => 'images/provider-cover/1000.jpg', 'type' => 'provider-cover',],
            
            ['id' => 1002, 'name' => 'images/provider-shows/1002.jpg', 'type' => 'provider-shows',],
            ['id' => 1003, 'name' => 'images/provider-shows/1003.jpg', 'type' => 'provider-shows',],
            ['id' => 1004, 'name' => 'images/provider-shows/1004.jpg', 'type' => 'provider-shows',],
            ['id' => 1005, 'name' => 'images/provider-shows/1005.jpg', 'type' => 'provider-shows',],
            ['id' => 1006, 'name' => 'images/provider-shows/1006.jpg', 'type' => 'provider-shows',],
            ['id' => 1007, 'name' => 'images/provider-shows/1007.jpg', 'type' => 'provider-shows',],
            ['id' => 1008, 'name' => 'images/provider-shows/1008.jpg', 'type' => 'provider-shows',],

            ['id' => 1009, 'name' => 'images/branch-cover/1009.jpg', 'type' => 'branch-cover',],

            ['id' => 1010, 'name' => 'images/branch-shows/1010.jpg', 'type' => 'branch-shows',],
            ['id' => 1011, 'name' => 'images/branch-shows/1011.jpg', 'type' => 'branch-shows',],
            ['id' => 1012, 'name' => 'images/branch-shows/1012.jpg', 'type' => 'branch-shows',],
            ['id' => 1013, 'name' => 'images/branch-shows/1013.jpg', 'type' => 'branch-shows',],





           





            

            // ['id' => 3 ,'name' => 'images/provider-cover/1.jpg', 'type' => 'provider-cover',],
            // ['id' => 4 ,'name' => 'images/provider-shows/1.jpg' , 'type' => 'provider-shows' , ],
            
            
            ['id' => 1100, 'name' => 'images/provider-cover/1100.jpg', 'type' => 'provider-cover',],

            ['id' => 1101, 'name' => 'images/provider-shows/1101.jpg', 'type' => 'provider-shows',],
            ['id' => 1102, 'name' => 'images/provider-shows/1102.jpg', 'type' => 'provider-shows',],
            ['id' => 1103, 'name' => 'images/provider-shows/1103.jpg', 'type' => 'provider-shows',],
            ['id' => 1104, 'name' => 'images/provider-shows/1104.jpg', 'type' => 'provider-shows',],
            ['id' => 1105, 'name' => 'images/provider-shows/1105.jpg', 'type' => 'provider-shows',],
            ['id' => 1106, 'name' => 'images/provider-shows/1106.jpg', 'type' => 'provider-shows',],
            ['id' => 1107, 'name' => 'images/provider-shows/1107.jpg', 'type' => 'provider-shows',],
            ['id' => 1108, 'name' => 'images/provider-shows/1108.jpg', 'type' => 'provider-shows',],
            ['id' => 1109, 'name' => 'images/provider-shows/1109.jpg', 'type' => 'provider-shows',],
            ['id' => 1110, 'name' => 'images/provider-shows/1110.jpg', 'type' => 'provider-shows',],
            ['id' => 1111, 'name' => 'images/provider-shows/1111.jpg', 'type' => 'provider-shows',],
            ['id' => 1112, 'name' => 'images/provider-shows/1112.jpg', 'type' => 'provider-shows',],
            ['id' => 1113, 'name' => 'images/provider-shows/1113.jpg', 'type' => 'provider-shows',],
            ['id' => 1114, 'name' => 'images/provider-shows/1114.jpg', 'type' => 'provider-shows',],
        ];
        
        Image::insert($images);
    }
}
