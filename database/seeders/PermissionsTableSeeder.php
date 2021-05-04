<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'area'  =>  'Users',
                'title' => 'user_access',
                'description' => 'Can access users'
            ],
            [
                'id'    => 2,
                'area'  =>  'Users',
                'title' => 'user_create',
                'description' => 'Can create users'
            ],
            [
                'id'    => 3,
                'area'  =>  'Users',
                'title' => 'user_edit',
                'description' => 'Can edit users'
            ],
            [
                'id'    => 4,
                'area'  =>  'Users',
                'title' => 'user_delete',
                'description' => 'Can delete users'
            ],
            [
                'id'    => 5,
                'area'  =>  'Tasks',
                'title' => 'task_access',
                'description' => 'Can access tasks'
            ],
            [
                'id'    => 6,
                'area'  =>  'Activity',
                'title' => 'activity_access',
                'description' => 'Can see activity'
            ],
            [
                'id'    => 7,
                'area'  =>  'Permissions',
                'title' => 'role_access',
                'description' => 'Can access permissions'
            ],
            [
                'id'    => 8,
                'area'  =>  'Permissions',
                'title' => 'role_create',
                'description' => 'Can create permissions'
            ],
            [
                'id'    => 9,
                'area'  =>  'Permissions',
                'title' => 'role_edit',
                'description' => 'Can edit permissions'
            ],
            [
                'id'    => 10,
                'area'  =>  'Permissions',
                'title' => 'role_delete',
                'description' => 'Can delete permissions'
            ],
            [
                'id'    => 11,
                'area'  =>  'Reviews',
                'title' => 'review_access',
                'description' => 'Can access reviews'
            ],
            [
                'id'    => 12,
                'area'  =>  'Reviews',
                'title' => 'review_create',
                'description' => 'Can create reviews'
            ],
            [
                'id'    => 13,
                'area'  =>  'Reviews',
                'title' => 'review_edit',
                'description' => 'Can edit reviews'
            ],
            [
                'id'    => 14,
                'area'  =>  'Reviews',
                'title' => 'review_delete',
                'description' => 'Can delete reviews'
            ],
            [
                'id'    => 15,
                'area'  =>  'Clients',
                'title' => 'client_access',
                'description' => 'Can access clients'
            ],
            [
                'id'    => 16,
                'area'  =>  'Clients',
                'title' => 'client_create',
                'description' => 'Can create clients'
            ],
            [
                'id'    => 17,
                'area'  =>  'Clients',
                'title' => 'client_edit',
                'description' => 'Can edit clients'
            ],
            [
                'id'    => 18,
                'area'  =>  'Clients',
                'title' => 'client_delete',
                'description' => 'Can delete clients'
            ],
            [
                'id'    => 19,
                'area'  =>  'Functions',
                'title' => 'can_view_matrix_cat',
                'description' => 'Can access functions'
            ],
            [
                'id'    => 20,
                'area'  =>  'Functions',
                'title' => 'can_edit_matrix_cat',
                'description' => 'Can edit functions'
            ],
            [
                'id'    => 21,
                'area'  =>  'Functions',
                'title' => 'can_create_matrix_cat',
                'description' => 'Can create functions'
            ],
            [
                'id'    => 22,
                'area'  =>  'Functions',
                'title' => 'can_delete_matrix_cat',
                'description' => 'Can delete functions'
            ],
            [
                'id'    => 23,
                'area'  =>  'Functions',
                'title' => 'can_function_assign',
                'description' => 'Can assign functions'
            ],
            [
                'id'    => 24,
                'area'  =>  'Estates',
                'title' => 'can_edit_estates',
                'description' => 'Can edit estates'
            ],
            [
                'id'    => 25,
                'area'  =>  'Estates',
                'title' => 'can_create_estates',
                'description' => 'Can create estates'
            ],
            [
                'id'    => 26,
                'area'  =>  'Estates',
                'title' => 'can_delete_estates',
                'description' => 'Can delete estates'
            ],
            [
                'id'    => 27,
                'area'  =>  'Estates',
                'title' => 'can_access_estates',
                'description' => 'Can access estates'
            ],
            [
                'id'    => 28,
                'area'  =>  'Digital Review',
                'title' => 'can_view_digi_reviews',
                'description' => 'Can view digital reviews'
            ],
            [
                'id'    => 29,
                'area'  =>  'Digital Review',
                'title' => 'can_create_digi_reviews',
                'description' => 'Can create digital reviews'
            ],
            [
                'id'    => 30,
                'area'  =>  'Digital Review',
                'title' => 'can_edit_digi_reviews',
                'description' => 'Can edit digital reviews'
            ],
            [
                'id'    => 31,
                'area'  =>  'Digital Review',
                'title' => 'can_delete_digi_reviews',
                'description' => 'Can delete digital reviews'
            ],
            [
                'id'    => 32,
                'area'  =>  'Members',
                'title' => 'can_view_members',
                'description' => 'Can view members'
            ],
            [
                'id'    => 33,
                'area'  =>  'Members',
                'title' => 'can_create_members',
                'description' => 'Can create members'
            ],
            [
                'id'    => 34,
                'area'  =>  'Members',
                'title' => 'can_edit_members',
                'description' => 'Can edit members'
            ],
            [
                'id'    => 35,
                'area'  =>  'Members',
                'title' => 'can_delete_members',
                'description' => 'Can delete members'
            ],
            [
                'id'    => 36,
                'area'  =>  'Review assignments',
                'title' => 'links_access',
                'description' => 'Can view assignments'
            ],
            [
                'id'    => 37,
                'area'  =>  'Review assignments',
                'title' => 'links_create',
                'description' => 'Can create assignments'
            ],
            [
                'id'    => 38,
                'area'  =>  'Review assignments',
                'title' => 'links_edit',
                'description' => 'Can edit assignments'
            ],
            [
                'id'    => 39,
                'area'  =>  'Review assignments',
                'title' => 'links_delete',
                'description' => 'Can delete assignments'
            ],
            [
                'id'    => 40,
                'area'  =>  'Reviews',
                'title' => 'conduct_assessment',
                'description' => 'Can conduct assessments'
            ],

        ];

        Permission::insert($permissions);
    }
}
