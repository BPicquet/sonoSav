<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Ticket;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = factory::create();

        for($i = 0; $i < 20; $i++){
            Ticket::create([
                'price'             => $faker->randomDigit(),
                'prior_agreement'   => $faker->sentence(),
                'customer_id'       => Customer::inRandomOrder()->first()->id,
            ]);
        }
    }
}
