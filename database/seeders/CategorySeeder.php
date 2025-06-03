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
            ['id'=> 1 ,'name' => 'معالم دينية'],
            ['id'=> 2 ,'name' => 'معالم أثرية'],
            ['id'=> 3 ,'name' => 'معالم ثقافية'],
            ['id'=> 4 ,'name' => 'بحر'],
            ['id'=> 5 ,'name' => 'معالم طبيعة'],
            ['id'=> 6 ,'name' => 'طبية'],
            ['id'=> 7 ,'name' => 'رحلات'],            
        ];
        Category::insert($categories);
    }
}
