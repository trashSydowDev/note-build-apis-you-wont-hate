<?php

class MerchantTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create();
        collect(range(1, Config::get('seeding.merchants')))->each(function () {
            Merchant::create([
                'name' => $faker->company,
                'website' => $faker->url,
                'phone' => $faker->phoneNumber,
                'description' => $faker->text(200),
            ]);
        });
    }
}
