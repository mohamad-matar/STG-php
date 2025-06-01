<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $places = [
            'id' => 1,
            'name_ar' => 'عرنوس',
            'name_en' => 'Arnos',
            'description_ar' => 'أسواق - مطاعم - حلويات',
            'description_en' => '',
            'province_id' => 1
        ];
        Place::insert($places);
    }
}
