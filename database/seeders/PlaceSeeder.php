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
                'id' => 100,
                'name_ar' => 'عرنوس',
                'name_en' => 'Arnos',
                'description_ar' => 'أسواق - مطاعم - حلويات',
                'description_en' => 'market - restuarant - desert',
                'province_id' => 1,
                'image_id' => 100,
                'created_by' => 1,
            ],
    
        ];
        Place::insert($places);
        Place::find(100)->categories()->attach([1,2]);
       
       
    }
}
