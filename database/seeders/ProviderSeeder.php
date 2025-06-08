<?php

namespace Database\Seeders;

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
        $providerUser = [
            'email' => 'p@p.com',
            'password' => '123', 
            'type' => 'provider'
        ];
         
        User::create($providerUser)->provider()->create([
            'name_ar' => 'مطعم دمشق',
            'name_en' => 'Damas restuarant',
            'description_ar' => ' مطعم مميز باكلاته الشرقية وأسعاره المناسبة',
            'description_en' => 'A distinctive restaurant with oriental cuisine and reasonable prices',
            'license_number' => 'x3456',
            'place_id' => 1,
        ]);
            
        $tourist = [
            'email' => 't@t.com',
            'password' => '123',
            'type' => 'tourist'
        ];
        User::create($tourist);
    }
}
