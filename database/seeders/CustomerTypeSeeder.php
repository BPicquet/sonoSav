<?php

namespace Database\Seeders;

use App\Models\CustomerType;
use Illuminate\Database\Seeder;

class CustomerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customerTypes = ['Particulier', 'Entreprise'];

        for($i = 0; $i < count($customerTypes); $i++){
            CustomerType::create([
                'label' => $customerTypes[$i]
            ]);
        }
    }
}
