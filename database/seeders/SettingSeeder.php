<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $components = [
            [
                'key' => 'logo',
                'value' => 1,
                'isFile' => 1,
            ],
            [
                'key' => 'main-img',
                'value' => 2,
                'isFile' => 1,
            ],           
                        [
                'key' => 'telegram',
                'value' => "",
                'isFile' => 0,
            ],
            [
                'key' => 'youtube',
                'value' => "",
                'isFile' => 0,
            ],
            [
                'key' => 'linked-in',
                'value' => "",
                'isFile' => 0,
            ],
            [
                'key' => 'instagram',
                'value' => "",
                'isFile' => 0,
            ],
            [
                'key' => 'X-twitter',
                'value' => "",
                'isFile' => 0,
            ],            
            [
                'key' => 'facebook',
                'value' => "",
                'isFile' => 0,
            ],
            [
                'key' => 'phone',
                'value' => "",
                'isFile' => 0,
            ],
            [
                'key' => 'mail',
                'value' => "",
                'isFile' => 0,
            ],                       
            [
                'key' => 'restaurant',
                'value' => 200,
                'isFile' => 0,
            ],
            [
                'key' => 'Hotel',
                'value' => 14,
                'isFile' => 0,
            ],
            [
                'key' => 'tour',
                'value' => '1446',
                'isFile' => 0,
            ],
        ];
        Setting::insert($components);
    }
}
          



