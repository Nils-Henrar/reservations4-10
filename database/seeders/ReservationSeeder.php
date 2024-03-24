<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Representation;
use App\Models\User;
use App\Models\Show;
use App\Models\Location;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // empty the table first

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('reservations')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Define data

        $reservations = [
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

        foreach ($reservations as &$reservation) {
            $show = Show::where('slug', $reservation['show_slug'])->first();
            // on cherche le slug du show dans la table show et on récupère la première ligne car slug est unique

            $location = Location::where('slug', $reservation['location_slug'])->first();
            // on cherche le slug de la location dans la table location et on récupère la première ligne car slug est unique

            $user = User::where('login', $reservation['user_login'])->first();
            // on cherche le login de l'utilisateur dans la table user et on récupère la première ligne car login est unique

            $representation = Representation::where('show_id', $show->id)
                ->where('location_id', $location->id)
                ->where('when', $reservation['representation_date'])
                ->first();
            // on cherche l'id du show, l'id de la location et la date de la représentation dans la table representation 
            //et on récupère la première ligne car ces trois champs sont uniques et représentent une seule représentation

            unset($reservation['show_slug']);
            unset($reservation['location_slug']);
            unset($reservation['user_login']);
            unset($reservation['representation_date']);
            // comme on a trouvé les données dans les tables show, location et user, on les supprime du tableau car elles n'existent pas dans la table representation_user

            $reservation['representation_id'] = $representation->id;
            $reservation['user_id'] = $user->id;
        }

        unset($reservation);

        //Insert the data in the table

        DB::table('reservations')->insert($reservations);
    }
}
