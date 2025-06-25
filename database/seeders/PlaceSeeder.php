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
                'id' => 200,
                'name_ar' =>  'قصر العظم ',
                'name_en' => 'palaic Azem',
                'description_ar' => 'متاحف -اثار ',
                'description_en' => 'museum-history',
                'province_id' => 1,
                'image_id' => 200,
                'created_by' => 1,
            ],
            [
                'id' => 215,
                'name_ar' =>  'الاسوق القديمة',
                'name_en' => 'Old Souck',
                'description_ar' => 'تاريخ -ثقافة',
                'description_en' => 'Cultural - history',
                'province_id' => 1,
                'image_id' => 215,
            ],[
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
             [
                'id' => 1000,                
                'name_ar' => 'استراحة البقيعة',
                'name_en' => 'Baqea break',
                'description_ar' => 'فطاير - حلويات',
                'description_en' => 'Fatayer - Sweets',
                'province_id' => 14,
                'image_id' => 2100 ,
                'created_by' => 1,                
             ],
             [
                'id' => 1001,                
                'name_ar' => 'شاطئ هوليداي',
                'name_en' => 'Holiday Beach',
                'description_ar' => 'منتجعات - غرف تبديل',
                'description_en' => 'Resorts - changing rooms',
                'province_id' => 8,
                'image_id' => 2101 ,
                'created_by' => 1,                
             ],                
        ];
        Place::insert($places);
        Place::find(200)->categories()->attach([2,3]);
        Place::find(215)->categories()->attach([1,2]);

        Place::find(1)->categories()->attach([2]);                
        
        Place::find(11)->categories()->attach([4]);

        Place::find(100)->categories()->attach([1, 2]);
        
        Place::find(1000)->categories()->attach([10]);
        
        Place::find(1001)->categories()->attach([4]);
    }
}
