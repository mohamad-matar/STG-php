<?php

namespace Database\Seeders;

use App\Models\Tourist;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    // $table->rememberToken();
    public function run(): void
    {
        User::create(
            [
                'id' => 1,
                'email' => 'a@a.com',
                'password' => '123',
                /** hashed through model */
                'type' => 'admin'
            ]);

        User::create([
                'id' => 2,
                'email' => 't@t.com',
                'password' => '123',
                'type' => 'tourist'
        ]);
        Tourist::create([
            'name' => 'test account',
            'country_id' => 200 , 
            'user_id' => 2
        ]);
        
    }
}
