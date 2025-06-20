<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\AssignOp\Plus;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $places = [
             [
                'id' => 1,
                'name_ar' => 'أسواق قديمة ',
                'name_en' => 'OLD MARKETS',
                'description_ar' => 'أسواق قديمة',
                'description_en' => 'OLD MARKETS',
                'province_id' => 1,
                'image_id' => 1,
                'created_by' => 1,
            ],
           
            [
                'id' => 11,
                'name_ar' => 'أماكن طبيعية ',
                'name_en' => 'natural places',
                'description_ar' => 'مغارة ',
                'description_en' => 'mosa',
                'province_id' => 1,
                'image_id' => 11,
                'created_by' => 1,
            ],
             [

                'id' => 100,
                'name_ar' => 'الجامع الأموي',
                'name_en' => 'the Umayyed Mosque ',
                'description_ar' => 'أسواق - مطاعم - حلويات',
                'description_en' => 'market - restuarant - desert',
                'province_id' => 1,
                'image_id' => 100,
                'created_by' => 1,
                
             ],
                
        ];
        Place::insert($places);



        Place::find(1)->categories()->attach([2]);

        
        
        Place::find(1)->categories()->attach([1]);
        Place::find(11)->categories()->attach([4]);
        
        Place::find(100)->categories()->attach([1,2]);
    }
}
