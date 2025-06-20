<?php

namespace Database\Seeders;

use App\Models\Provider\Provider;
use App\Models\Provider\ProviderShow;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    // $table->rememberToken();
    public function run(): void
    {
        User::create([
            'id' => 5,
            'email' => 'p@p.com',
            'password' => '123',
            'type' => 'provider'
        ]);

        Provider::create([
            'id' => 1,
            'name_ar' => 'مطعم مكاني',
            'name_en' => 'my place restuarant',
            'description_ar' => ' مطعم مميز باكلاته الشرقية وأسعاره المناسبة',
            'description_en' => 'A distinctive restaurant with oriental cuisine and reasonable prices',
            'license_number' => 'x3456',
            'image_id' => 1000,
            'user_id' => 5,
        ]);
        Provider::find(1)->services()->attach([1]);


        $providerShows = [
            [
                'name_ar' => '',
                'name_en' => '',
                'provider_id' => 1,
                'image_id' => 1002,
            ],
            [
                'name_ar' => '',
                'name_en' => '',
                'provider_id' => 1,
                'image_id' => 1003,
            ],
            [
                'name_ar' => '',
                'name_en' => '',
                'provider_id' => 1,
                'image_id' => 1004,
            ],
            [
                'name_ar' => '',
                'name_en' => '',
                'provider_id' => 1,
                'image_id' => 1005,
            ],
            [
                'name_ar' => '',
                'name_en' => '',
                'provider_id' => 1,
                'image_id' => 1006,
            ],
            [
                'name_ar' => '',
                'name_en' => '',
                'provider_id' => 1,
                'image_id' => 1007,
            ],
            [
                'name_ar' => '',
                'name_en' => '',
                'provider_id' => 1,
                'image_id' => 1008,
            ],
        ];

        ProviderShow::insert($providerShows);
        
        $tourist = [
            'email' => 't@t.com',
            'password' => '123',
            'type' => 'tourist'
        ];
        User::create($tourist);
    }
}
