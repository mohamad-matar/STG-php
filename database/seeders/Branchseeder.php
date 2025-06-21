<?php

namespace Database\Seeders;

use App\Models\Provider\Branch;
use App\Models\Provider\BranchShow;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Branchseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Branch::create([
            'id' => 1,
            'name_ar' => 'فرع كفرسوسة',
            'name_en' => 'Kafrsousa Branch',
            'description_ar' => ' إطلالة رائعة - خدمة ممتازة - اكلات غربية ',
            'description_en' => 'Great view - excellent service - Western food',
            'image_id' => 1009,
            'provider_id' => 1,
        ]);


        $branchShows = [
            [
                'name_ar' => '',
                'name_en' => '',
                'branch_id' => 1,
                'image_id' => 1010,
            ],
            [
                'name_ar' => '',
                'name_en' => '',
                'branch_id' => 1,
                'image_id' => 1011,
            ],
            [
                'name_ar' => '',
                'name_en' => '',
                'branch_id' => 1,
                'image_id' => 1012,
            ],
            [
                'name_ar' => '',
                'name_en' => '',
                'branch_id' => 1,
                'image_id' => 1013,
            ],
        ];
        BranchShow::insert($branchShows);
    }
}
