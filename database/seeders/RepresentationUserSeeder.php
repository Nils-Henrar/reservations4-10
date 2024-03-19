<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Representation;
use App\Models\User;
use App\Models\Show;
use App\Models\Location;

class RepresentationUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // empty the table first

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('representation_user')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Define data

        $representationUsers = [
            [
                'show_slug' => 'ayiti',
                'location_slug' => 'espace-delvaux-la-venerie',
                'user_login' => 'bob',
                'representation_date' => '2012-10-12 13:30:00',
                'places' => 2,
            ],

            [
                'show_slug' => 'ayiti',
                'location_slug' => 'dexia-art-center',
                'user_login' => 'nils',
                'representation_date' => '2012-10-12 20:30:00',
                'places' => 1,
            ],

        ];

        //Prepare the data

        //Search the representation for the given show, location and date

        foreach ($representationUsers as &$representationUser) {
            $show = Show::where('slug', $representationUser['show_slug'])->first();

            $location = Location::where('slug', $representationUser['location_slug'])->first();

            $user = User::where('login', $representationUser['user_login'])->first();

            $representation = Representation::where('show_id', $show->id)
                ->where('location_id', $location->id)
                ->where('when', $representationUser['representation_date'])
                ->first();

            unset($representationUser['show_slug']);
            unset($representationUser['location_slug']);
            unset($representationUser['user_login']);
            unset($representationUser['representation_date']);

            $representationUser['representation_id'] = $representation->id;
            $representationUser['user_id'] = $user->id;
        }

        unset($representationUser);

        //Insert the data in the table

        DB::table('representation_user')->insert($representationUsers);
    }
}
