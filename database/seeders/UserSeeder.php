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
        $users = [
            [
                'id' => 1,
                'email' => 'a@a.com',
                'password' => '123',
                /** hashed through model */
                'type' => 'admin'
            ],
            [
                'id' => 2,
                'email' => 't@t.com',
                'password' => '123',
                'type' => 'tourist'
            ]
        ];
        User::insert($users);
    }
}
