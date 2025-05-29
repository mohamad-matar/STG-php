<?php

namespace Database\Seeders;

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
        $admin = [
            'email' => 'a@a.com',
            'password' => '123', /** hashed through model */
            'type' => 'admin'
        ];
        User::create($admin);
        $provider = [
            'email' => 'p@p.com',
            'password' => '123', 
            'type' => 'provider'
        ];
        User::create($provider);
        $tourist = [
            'email' => 't@t.com',
            'password' => '123',
            'type' => 'tourist'
        ];
        User::create($tourist);
    }
}
