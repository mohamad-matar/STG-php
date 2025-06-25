<?php

namespace Database\Seeders;

use App\Models\Provider\Api;
use App\Models\Provider\Provider;
use App\Models\Provider\ProviderShow;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** ********************* مطعم مكاني *************/
        User::create([
            'id' => 5,
            'email' => 'm@m.com',
            'password' => '123',
            'type' => 'provider'
        ]);

        Provider::create([
            'id' => 1,
            'name_ar' => 'مطعم مكاني',
            'name_en' => 'Makani Restuarant',
            'description_ar' => ' مطعم مميز باكلاته الشرقية وأسعاره المناسبة',
            'description_en' => 'A distinctive restaurant with oriental cuisine and reasonable prices',
            'license_number' => 'x3456',
            'accepted' => 1,
            'image_id' => 1000,
            'user_id' => 5,
        ]);
               
        Provider::find(1)->services()->attach([1]);

        Api::create([
            'services_url' => 'http://127.0.0.1:9999/api/services', 
            'request_url'  => 'http://127.0.0.1:9999/api/request',
            'view_url' => 'http://127.0.0.1:9999/meals', 
            'provider_id' => 1
        ]);

        ProviderShow::insert([
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
            [
                'name_ar' => '',
                'name_en' => '',
                'provider_id' => 1,
                'image_id' => 1005,
            ]
        ]);

       

        /** ********************* سميراميس *************/
        User::create([
            'id' => 100,
            'email' => 's@s.com',
            'password' => '123',
            'type' => 'provider'
        ]);
       
        Provider::create(
            [
                'id' => 2,
                'name_ar' => 'فندق سميرامس',
                'name_en' => 'Royal Semiramis',
                'description_ar' => 'يتألف فندق سميراميس من ثمانية طوابق وقرابة 110 غرفة ويحتوي على فرش فاخر ويضم مطاعم عربية وأجنبية ',
                'description_en' => 'Semiramis Hotel consists of eight floors and approximately 110 rooms. It has luxurious furniture and includes Arab and international restaurants.',
                'license_number' => 'x32322',
                'accepted' => 1,
                'image_id' => 1100,
                'user_id' => 100,
            ],
        );

        Provider::find(2)->services()->attach([2]);

        ProviderShow::insert([
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
            ]
        ]);

        /** ******************** مكتب عنبر  *************/
        User::create([
            'id' => 2000 ,
            'email' => 'amani@gmail.com',
            'password' => '123',
            'type' => 'provider'
        ]);

        Provider::create([
            'id' => 2000,
            'name_ar' => ' مكتب اماني للسياحة والسفر',
            'name_en' => 'Amani Tourism and Travel Office',
            'description_ar' => ' مكتب اماني للسياحة والسفر بأسعاره المنافسة',
            'description_en' => 'Amani Tourism and Travel Office with competitive prices',
            'license_number' => 'x3aaam',
            'accepted' => 1,
            'image_id' => 2000,
            'user_id' => 2000,
        ]);
    }

}
