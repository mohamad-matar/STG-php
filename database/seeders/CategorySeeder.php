<?php

namespace Database\Seeders;

use App\Admin\Models\Service;
use App\Models\Admin\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {     
        $categories = [
            ['id'=> 1 ,'name_ar' => 'معالم دينية' , 'name_en' => 'Religious Monuments'],
            ['id'=> 2 ,'name_ar' => 'معالم أثرية' , 'name_en' => 'Monuments'],
            ['id'=> 3 ,'name_ar' => 'معالم ثقافية' , 'name_en' => 'Cultural-Landmarks'],
            ['id'=> 4 ,'name_ar' => 'معالم طبيعة' , 'name_en' => 'Natural-Attractions'],
            ['id'=> 6 ,'name_ar' => 'طبية' , 'name_en' => 'Medical'],
            ['id'=> 8 ,'name_ar' => 'اسواق' , 'name_en' => 'Market'],
            ['id' => 9, 'name_ar' => 'مطاعم', 'name_en' => 'Restaurants'],
            ['id'=> 10 ,'name_ar' => 'استراحات' , 'name_en' => 'Rest stops'],
           
        ];
        Category::insert($categories);
    }
}
