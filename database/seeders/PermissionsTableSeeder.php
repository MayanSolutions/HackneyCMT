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
                'area'  =>  'users',
                'title' => 'user_access',
                'description' => 'Can access users'
            ],
            [
                'id'    => 2,
                'area'  =>  'users',
                'title' => 'user_create',
                'description' => 'Can create users'
            ],
            [
                'id'    => 3,
                'area'  =>  'users',
                'title' => 'user_edit',
                'description' => 'Can edit users'
            ],
            [
                'id'    => 4,
                'area'  =>  'users',
                'title' => 'user_delete',
                'description' => 'Can delete users'
            ],
            [
                'id'    => 5,
                'area'  =>  'tasks',
                'title' => 'task_access',
                'description' => 'Can access tasks'
            ],
            [
                'id'    => 6,
                'area'  =>  'activity',
                'title' => 'activity_access',
                'description' => 'Can see activity'
            ],
            [
                'id'    => 7,
                'area'  =>  'permissions',
                'title' => 'role_access',
                'description' => 'Can access permissions'
            ],
            [
                'id'    => 8,
                'area'  =>  'permissions',
                'title' => 'role_create',
                'description' => 'Can create permissions'
            ],
            [
                'id'    => 9,
                'area'  =>  'permissions',
                'title' => 'role_edit',
                'description' => 'Can edit permissions'
            ],
            [
                'id'    => 10,
                'area'  =>  'permissions',
                'title' => 'role_delete',
                'description' => 'Can delete permissions'
            ],
            [
                'id'    => 11,
                'area'  =>  'reviews',
                'title' => 'review_access',
                'description' => 'Can access reviews'
            ],
            [
                'id'    => 12,
                'area'  =>  'reviews',
                'title' => 'review_create',
                'description' => 'Can create reviews'
            ],
            [
                'id'    => 13,
                'area'  =>  'reviews',
                'title' => 'review_edit',
                'description' => 'Can edit reviews'
            ],
            [
                'id'    => 14,
                'area'  =>  'reviews',
                'title' => 'review_delete',
                'description' => 'Can delete reviews'
            ],
            [
                'id'    => 15,
                'area'  =>  'clients',
                'title' => 'client_access',
                'description' => 'Can access clients'
            ],
            [
                'id'    => 16,
                'area'  =>  'clients',
                'title' => 'client_create',
                'description' => 'Can create clients'
            ],
            [
                'id'    => 17,
                'area'  =>  'clients',
                'title' => 'client_edit',
                'description' => 'Can edit clients'
            ],
            [
                'id'    => 18,
                'area'  =>  'clients',
                'title' => 'client_delete',
                'description' => 'Can delete clients'
            ],
            [
                'id'    => 19,
                'area'  =>  'functions',
                'title' => 'can_view_matrix_cat',
                'description' => 'Can access functions'
            ],
            [
                'id'    => 20,
                'area'  =>  'functions',
                'title' => 'can_edit_matrix_cat',
                'description' => 'Can edit functions'
            ],
            [
                'id'    => 21,
                'area'  =>  'functions',
                'title' => 'can_create_matrix_cat',
                'description' => 'Can create functions'
            ],
            [
                'id'    => 22,
                'area'  =>  'functions',
                'title' => 'can_delete_matrix_cat',
                'description' => 'Can delete functions'
            ],
            [
                'id'    => 23,
                'area'  =>  'functions',
                'title' => 'can_function_assign',
                'description' => 'Can assign functions'
            ],
            [
                'id'    => 24,
                'area'  =>  'estates',
                'title' => 'can_edit_estates',
                'description' => 'Can edit estates'
            ],
            [
                'id'    => 25,
                'area'  =>  'estates',
                'title' => 'can_create_estates',
                'description' => 'Can create estates'
            ],
            [
                'id'    => 26,
                'area'  =>  'estates',
                'title' => 'can_delete_estates',
                'description' => 'Can delete estates'
            ],
            [
                'id'    => 27,
                'area'  =>  'estates',
                'title' => 'can_access_estates',
                'description' => 'Can access estates'
            ],
            [
                'id'    => 28,
                'area'  =>  'Digital Review',
                'title' => 'can_view_digi_reviews',
                'description' => 'Can view digital Reviews'
            ],
            [
                'id'    => 29,
                'area'  =>  'Digital Review',
                'title' => 'can_create_digi_reviews',
                'description' => 'Can create digital Reviews'
            ],
            [
                'id'    => 30,
                'area'  =>  'Digital Review',
                'title' => 'can_edit_digi_reviews',
                'description' => 'Can edit digital Reviews'
            ],
            [
                'id'    => 31,
                'area'  =>  'Digital Review',
                'title' => 'can_delete_digi_reviews',
                'description' => 'Can delete digital Reviews'
            ],
            
        ];

        Permission::insert($permissions);
    }
}
