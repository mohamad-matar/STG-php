<?php

namespace Database\Seeders;

use App\Models\Image;
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
            ['id' => 217, 'name' => 'images/place-shows/217.jpg', 'type' => 'places-show',],
        
            ['id' => 218, 'name' => 'images/place-shows/218.jpg', 'type' => 'places-show',],
            ['id' => 219, 'name' => 'images/place-shows/219.jpg', 'type' => 'places-show',],
            ['id' => 220, 'name' => 'images/place-shows/220.jpg', 'type' => 'places-show',],
            ['id' => 221, 'name' => 'images/place-shows/221.jpg', 'type' => 'places-show',],
            ['id' => 222, 'name' => 'images/place-shows/222.jpg', 'type' => 'places-show',],
            ['id' => 223, 'name' => 'images/place-shows/223.jpg', 'type' => 'places-show',],
            ['id' => 224, 'name' => 'images/place-shows/224.jpg', 'type' => 'places-show',],
            ['id' => 225, 'name' => 'images/place-shows/225.jpg', 'type' => 'places-show',],
            ['id' => 226, 'name' => 'images/place-shows/226.jpg', 'type' => 'places-show',],
            ['id' => 227, 'name' => 'images/place-shows/227.jpg', 'type' => 'places-show',],
            ['id' => 228, 'name' => 'images/place-shows/228.jpg', 'type' => 'places-show',],
            ['id' => 229,'name' =>'images/place-shows/229.jpg', 'type' => 'places-show',],

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
            
            ['id' => 2000, 'name' => 'images/provider-cover/2000.jpg', 'type' => 'provider-cover',],
            
            ['id' => 2100, 'name' => 'images/places/2100.jpg', 'type' => 'places',],
            ['id' => 2101, 'name' => 'images/places/2101.jpg', 'type' => 'places',],

            ['id' => 4000, 'name' => 'images/places/4000.jpg', 'type' => 'places',],

            ['id' => 4001, 'name' => 'images/place-shows/4001.jpg', 'type' => 'places-show',],
            ['id' => 4002, 'name' => 'images/place-shows/4002.jpg', 'type' => 'places-show',],
            ['id' => 4003, 'name' => 'images/place-shows/4003.jpg', 'type' => 'places-show',],
            ['id' => 4004, 'name' => 'images/place-shows/4004.jpg', 'type' => 'places-show',],
            ['id' => 4005, 'name' => 'images/place-shows/4005.jpg', 'type' => 'places-show',],
            ['id' => 4006, 'name' => 'images/place-shows/4006.jpg', 'type' => 'places-show',],
            ['id' => 4005, 'name' => 'images/place-shows/4005.jpg', 'type' => 'places-show',],
            ['id' => 4006, 'name' => 'images/place-shows/4006.jpg', 'type' => 'places-show',],
            ['id' => 4007, 'name' => 'images/place-shows/4007.jpg', 'type' => 'places-show',],
    

        ];
        
        Image::insert($images);
    }
}