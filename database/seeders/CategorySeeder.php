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
            ['name' => 'معالم أثرية'],
            ['name' => 'معالم ثقافية'],
            ['name' => 'معالم دينية'],
            ['name' => 'بحر'],
            ['name' => 'معالم طبيعة'],
            ['name' => 'طبية'],
            ['name' => 'رحلات'],            
        ];
        Category::insert($categories);
    }
}
