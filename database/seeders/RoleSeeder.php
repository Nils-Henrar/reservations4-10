<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        //

        //empty the table first
        DB::table('roles')->truncate();

        //Define the data

        $roles = [
            ['role' => 'admin'],
            ['role' => 'member'],
            ['role' => 'affiliate'],
        ];
    }
}
