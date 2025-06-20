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
            'id' => 2,
            'name_ar' =>'فندق سميرامس',
            'name_en' => 'ROYAL SEMIRAMIS',
            'description_ar' => 'يتألف فندق سميراميس من ثمانية طوابق وقرابة 110 غرفة ويحتوي على فرش فاخر ويضم مطاعم عربية وأجنبية ',
            'description_en' => 'Semiramis Hotel consists of eight floors and approximately 110 rooms. It has luxurious furniture and includes Arab and international restaurants.',
            'license_number' => 'x3456',
            'image_id' => 2,
            'user_id' => 2,
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
        
        $placeShows = [
          [
                'name_ar' => '',
                'name_en' => '',                   
                'provider_id' => 2,
                'image_id' => 1101,                
            ],
          [
                'name_ar' => '',
                'name_en' => '',                   
                'provider_id' => 2,
                'image_id' => 1102,                
            ],
          [
                'name_ar' => '',
                'name_en' => '',                   
                'provider_id' => 2,
                'image_id' => 1103,                
            ],
          [
                'name_ar' => '',
                'name_en' => '',                   
                'provider_id' => 2,
                'image_id' => 1104,                
            ],
          [
                'name_ar' => '',
                'name_en' => '',                   
                'provider_id' => 2,
                'image_id' => 1105,                
            ],
          [
                'name_ar' => '',
                'name_en' => '',                   
                'provider_id' => 2,
                'image_id' => 1106,                
            ],
          [
                'name_ar' => '',
                'name_en' => '',                   
                'provider_id' => 2,
                'image_id' => 1107,                
            ],
          [
                'name_ar' => '',
                'name_en' => '',                   
                'provider_id' => 2,
                'image_id' => 1108,                
            ],
          [
                'name_ar' => '',
                'name_en' => '',                   
                'provider_id' => 2,
                'image_id' => 1109,                
            ],
          [
                'name_ar' => '',
                'name_en' => '',                   
                'provider_id' => 2,
                'image_id' => 1110,                
            ],
          [
                'name_ar' => '',
                'name_en' => '',                   
                'provider_id' => 2,
                'image_id' => 1111,                
            ],
        [
                'name_ar' => '',
                'name_en' => '',                   
                'provider_id' => 2,
                'image_id' => 1112,                
            ],
          [
                'name_ar' => '',
                'name_en' => '',                   
                'provider_id' => 2,
                'image_id' => 1113,                
            ],
          [
                'name_ar' => '',
                'name_en' => '',                   
                'provider_id' => 2,
                'image_id' => 1114,                
            ],
        ];


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
