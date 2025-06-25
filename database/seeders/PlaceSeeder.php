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
                'id' => 300,
                'name_ar' => 'أسواق قديمة ',
                'name_en' => 'OLD MARKETS',
                'description_ar' => 'أسواق قديمة',
                'description_en' => 'OLD MARKETS',
                'province_id' => 1,
                'image_id' => 300,
                'created_by' => 1,
            ],
        ];
        Place::insert($places);


        Place::find(300)->categories()->attach([2]);
        
    }
}
