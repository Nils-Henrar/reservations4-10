<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('user_role')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');


        // Define data

        $userRoles = [
            [
                'user_role' => 'admin',
                'user_login' => 'bob',
            ],
            [
                'user_role' => 'member',
                'user_login' => 'john',
            ],
            [
                'user_role' => 'affiliate',
                'user_login' => 'jane',
            ],
            [
                'user_role' => 'member',
                'user_login' => 'nils',
            ],
        ];

        // Insert data in the table

        foreach ($userRoles as &$userRole) {
            //search the user for the login
            $user = User::where('login', $userRole['user_login'])->first();

            //search the role for the role (peut avoir plusieurs roles)

            $role = Role::where('role', $userRole['user_role'])->first();


            unset($userRole['user_login']);
            unset($userRole['user_role']);

            $userRole['user_id'] = $user->id;
            $userRole['role_id'] = $role->id;
        }

        unset($userRole);

        DB::table('user_role')->insert($userRoles);
    }
}
