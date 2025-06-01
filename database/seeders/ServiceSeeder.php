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
            ['name' => 'مطاعم'],
            ['name' => 'فنادق'],
            ['name' => 'منتزهات'],
            ['name' => 'سباحة'],            
        ];
        Service::insert($services);
    }
}
