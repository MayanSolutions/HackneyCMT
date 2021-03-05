<?php

namespace Database\Seeders;
use App\Models\clients;
use App\Models\MatrixCatergory;
use App\Models\MatrixFunction;

use Illuminate\Database\Seeder;

class CatergoryFunctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'area'  =>  'users',
                'title' => 'user_access',
                'description' => 'Can access users'
            ]
            ];
    }
}
