<?php

namespace Database\Seeders;

use App\Models\Admin\Setting;
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
        Setting::insert($components);
    }
}
          



