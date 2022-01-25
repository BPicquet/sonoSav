<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Customer;
use App\Models\CustomerType;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = factory::create();

        for($i = 0; $i < 5; $i++){
            Customer::create([
                'name'              => $faker->lastName(),
                'first_name'        => $faker->firstName(),
                'code_client'       => $faker->randomDigit(),
                'customer_type_id'  => CustomerType::inRandomOrder()->first()->id,
                'phone'             => $faker->randomDigit(),
                'mail'              => $faker->email(),
                'address'           => $faker->address(),
                'postal_code'       => $faker->randomDigit(),
                'city'              => $faker->city(),
            ]);
        }
    }
}
