<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DashOrder;

class DashSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dashOrder = [
            [
                'id'    => 1,
                'user_id'  =>  1,
                'component_call' => 'dashprofile',
                'position' => 1
            ],
            [
                'id'    => 2,
                'user_id'  =>  1,
                'component_call' => 'dashnotifications',
                'position' => 2
            ],
        ];

            DashOrder::insert($dashOrder);
    }
}
