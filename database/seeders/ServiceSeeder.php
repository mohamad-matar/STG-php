<?php

namespace Database\Seeders;

use App\Models\Admin\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['id' => 1,'name_ar' => 'مطاعم', 'name_en' => 'Restaurants'],
            ['id' => 2,'name_ar' => 'فنادق', 'name_en' => 'Hotels'],
            ['id' => 3,'name_ar' => 'منتزهات', 'name_en' => 'Parks'],
            ['id' => 4,'name_ar' => 'سباحة', 'name_en' => 'Swim'],
        ];
        Service::insert($services);
    }
}
