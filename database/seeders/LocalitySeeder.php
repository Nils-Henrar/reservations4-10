<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Villes de blegiques

        //empty the table first
        DB::table('localities')->truncate();

        //Define the data 19 communes de Bruxelles

        $localities = [
            ['postal_code' => '1000', 'locality' => 'Bruxelles'],
            ['postal_code' => '1020', 'locality' => 'Laeken'],
            ['postal_code' => '1030', 'locality' => 'Schaerbeek'],
            ['postal_code' => '1040', 'locality' => 'Etterbeek'],
            ['postal_code' => '1050', 'locality' => 'Ixelles'],
            ['postal_code' => '1060', 'locality' => 'Saint-Gilles'],
            ['postal_code' => '1070', 'locality' => 'Anderlecht'],
            ['postal_code' => '1080', 'locality' => 'Molenbeek-Saint-Jean'],
            ['postal_code' => '1081', 'locality' => 'Koekelberg'],
            ['postal_code' => '1082', 'locality' => 'Berchem-Sainte-Agathe'],
            ['postal_code' => '1083', 'locality' => 'Ganshoren'],
            ['postal_code' => '1090', 'locality' => 'Jette'],
            ['postal_code' => '1140', 'locality' => 'Evere'],
            ['postal_code' => '1150', 'locality' => 'Woluwe-Saint-Pierre'],
            ['postal_code' => '1160', 'locality' => 'Auderghem'],
            ['postal_code' => '1170', 'locality' => 'Watermael-Boitsfort'],
            ['postal_code' => '1180', 'locality' => 'Uccle'],
            ['postal_code' => '1190', 'locality' => 'Forest'],
            ['postal_code' => '1200', 'locality' => 'Woluwe-Saint-Lambert'],
        ];

        //Insert the data in the table

        DB::table('localities')->insert($localities);
    }
}
