<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CountrySeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PlaceSeeder::class);
        $this->call(PlaceShowSeeder::class);
        $this->call(ProviderSeeder::class);
        $this->call(SettingSeeder::class);
    }
}
