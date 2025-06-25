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
            'name_en' => 'Kafr Sousa Branch',
            'description_ar' => ' مطعم مميز باكلاته الشرقية وأسعاره المناسبة',
            'description_en' => 'A distinctive restaurant with oriental cuisine and reasonable prices',
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
