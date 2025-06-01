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
            ['id' => 1,'name_en' => 'Damascus', 'name_ar' => 'دمشق'],
            ['id' => 2,'name_en' => 'Aleppo', 'name_ar' => 'حلب'],
            ['id' => 3,'name_en' => 'Rural Damascus', 'name_ar' => 'ريف دمشق'],
            ['id' => 4,'name_en' => 'Daraa', 'name_ar' => 'درعا'],
            ['id' => 5,'name_en' => 'Sweida', 'name_ar' => 'السويداء'],
            ['id' => 6,'name_en' => 'Quneitra', 'name_ar' => 'القنيطرة'],
            ['id' => 7,'name_en' => 'Latakia', 'name_ar' => 'اللاذقية'],
            ['id' => 8,'name_en' => 'Tartus', 'name_ar' => 'طرطوس'],
            ['id' => 9,'name_en' => 'Idleb', 'name_ar' => 'إدلب'],
            ['id' => 10,'name_en' => 'Hama', 'name_ar' => 'حماة'],
            ['id' => 11,'name_en' => 'Hasakeh', 'name_ar' => 'الحسكة'],
            ['id' => 12,'name_en' => 'Raqqa', 'name_ar' => 'الرقة'],
            ['id' => 13,'name_en' => 'Deir Ezzur', 'name_ar' => 'ديرالزور'],
            ['id' => 14,'name_en' => 'Homs', 'name_ar' => 'حمص'],
        ];
        Province::insert($provinces);
    }
}
