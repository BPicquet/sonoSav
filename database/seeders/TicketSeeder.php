<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\State;
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
                'customer_id'               => Customer::inRandomOrder()->first()->id,
                'number_invoice'            => $faker->randomDigit(),
                'purchase_date'             => $faker->date($format = 'Y-m-d', $max = 'now'),
                'category'                  => $faker->word(),
                'brand'                     => $faker->word(),
                'model'                     => $faker->word(),
                'serial_number'             => $faker->randomDigit(),
                'breakdown'                 => $faker->sentence(),
                'exchange_type'             => $faker->word(),
                'exchange_number_ticket'    => $faker->randomDigit(),
                'price'                     => $faker->randomDigit(),
                'prior_agreement'           => $faker->sentence(),
                'rules_sav'                 => $faker->boolean(),
                'created_by_id'             => User::inRandomOrder()->first()->id,
                'state_id'                  => State::inRandomOrder()->first()->id,
            ]);
        }
    }
}
