<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatergorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories =[
            [
                    'id'    => 1,
                    'category'  =>  'Resident Safety',
                    'description' => 'Health and safety of residents',
            ]
            ];

    }
}
