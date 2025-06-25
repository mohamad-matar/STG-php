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
                'created_by' => 1,
            ],
        ];
        Place::insert($places);
        Place::find(200)->categories()->attach([2,3]);
        Place::find(215)->categories()->attach([1,2]);
    }
}
