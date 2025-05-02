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
            ],
            [
                'key' => 'youtube',
                'value' => "",
            ],
            [
                'key' => 'linked-in',
                'value' => "",
            ],
            [
                'key' => 'instagram',
                'value' => "",
            ],
            [
                'key' => 'X-twitter',
                'value' => "",
            ],            
            [
                'key' => 'facebook',
                'value' => "",
            ],
            [
                'key' => 'phone',
                'value' => "",
            ],
            [
                'key' => 'mail',
                'value' => "",
            ],                       
            [
                'key' => 'restaurant',
                'value' => 200,
            ],
            [
                'key' => 'Hotel',
                'value' => 14,
            ],
            [
                'key' => 'tour',
                'value' => '1446',
            ],
        ];
        foreach ($components as $component)
            Setting::create($component);
    }
}
