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
            'id' => 1,
            'email' => 'a@a.com',
            'password' => '123', /** hashed through model */
            'type' => 'admin'
        ];
        User::create($admin);
        $providerUser = [
            'email' => 'p@p.com',
            'password' => '123', 
            'type' => 'provider'
        ];                 
    }
}
