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
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'job_title'          => 'TMO Liaison Officer',
                'department'          => 'Housing Services',
                'organisation'          => 'London Borough of Hackney',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'User',
                'email'          => 'user@user.com',
                'job_title'          => 'Housing Officer',
                'department'          => 'Housing Services',
                'organisation'          => 'London Borough of Hackney',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
