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
                'name_ar' => 'عرنوس',
                'name_en' => 'Arnos',
                'description_ar' => 'أسواق - مطاعم - حلويات',
                'description_en' => 'market - restuarant - desert',
                'province_id' => 1, 
                'created_by' => 1,
            ],
            [
                'id' => 2,
                'name_ar' => 'قلعة',
                'name_en' => 'castel',
                'description_ar' => 'قلعة أئرية بنيت زمان الرومان',
                'description_en' => 'Old Castel ',
                'province_id' => 2,
                'created_by' => 1,
            ],
            [
                'id' => 3,
                'name_ar' => 'ربوة',
                'name_en' => 'ٌRabwa',
                'description_ar' => 'قريبة من العاصمة مطلة على نهر ',
                'description_en' => 'Near to Damas ..',
                'province_id' => 1,
                'created_by' => 1,
            ],
        ];
        Place::insert($places);
        Place::find(1)->categories()->attach([8,9,10]);
        Place::find(2)->categories()->attach(2);
        Place::find(3)->categories()->attach(5);
    }
}
