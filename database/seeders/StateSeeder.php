<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state = ['Traitement', 'Envoie', 'Reparation', 'Disponible', 'Fini'];

        for($i = 0; $i < count($state); $i++){
            State::create([
                'name' => $state[$i]
            ]);
        }
    }
}
