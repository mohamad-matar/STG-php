<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            ['name_en' => 'Damascus', 'name_ar' => 'دمشق'],
            ['name_en' => 'Aleppo', 'name_ar' => 'حلب'],
            ['name_en' => 'Rural Damascus', 'name_ar' => 'ريف دمشق'],
            ['name_en' => 'Daraa', 'name_ar' => 'درعا'],
            ['name_en' => 'Sweida', 'name_ar' => 'السويداء'],
            ['name_en' => 'Quneitra', 'name_ar' => 'القنيطرة'],
            ['name_en' => 'Latakia', 'name_ar' => 'اللاذقية'],
            ['name_en' => 'Tartus', 'name_ar' => 'طرطوس'],
            ['name_en' => 'Idleb', 'name_ar' => 'إدلب'],
            ['name_en' => 'Hama', 'name_ar' => 'حماة'],
            ['name_en' => 'Hasakeh', 'name_ar' => 'الحسكة'],
            ['name_en' => 'Raqqa', 'name_ar' => 'الرقة'],
            ['name_en' => 'Deir Ezzur', 'name_ar' => 'ديرالزور'],
            ['name_en' => 'Homs', 'name_ar' => 'حمص'],
        ];
        Province::insert($provinces);
    }
}
