<?php

$faker = Faker\Factory::create();

for ($i = 0; $i < Config::get('seeding.users'); $i++) {
    User::create([
        'name' => $faker->name,
        'email' => $faker->email,
        'active' => $i === 0 ? true : $faker->boolean,
        'gender' => $faker->randomElement(['male', 'female', 'other']),
        'timezone' => $faker->numberBetween(-10, 10),
        'birthday' => $faker->dateTimeBetween('-40 years', '-18 years'),
        'location' => $faker->boolean ? "{$faker->city}, {$faker->state}" : null,
        'had_feedback_email' => $faker->boolean,
        'sync_name_bio' => $faker->boolean,
        'bio' => $faker->sentence(100)
    ]);
}
