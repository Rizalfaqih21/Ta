<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
            ],
        ];

        User::insert($users);
    }
}