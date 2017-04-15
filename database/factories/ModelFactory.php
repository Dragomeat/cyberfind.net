<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->defineAs(App\Models\User::class, 'users_admin', function () {
    return [
        'login' => 'admin',
        'email' => 'admin@cyberfind.net',
        'password' => bcrypt('secret'),
        'is_confirmed' => true,
        'role' => 'chief',
    ];
});

$factory->defineAs(App\Models\User::class, 'users', function (Faker\Generator $faker) {
    return [
        'login' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt((string) random_int(0, PHP_INT_MAX)),
        'is_confirmed' => true,
    ];
});

$factory->define(\App\Models\Team::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'age_min' => $faker->numberBetween(14, 18),
        'age_max' => $faker->numberBetween(18, 60),
        'city' => $faker->city,
        'goal' => $faker->words(2, true),
        'goal_text' => $faker->paragraphs(2, true),
        'join_additional' => $faker->paragraphs(2, true),
        'command_limit' => $faker->numberBetween(5, 15),
    ];
});

$organizers = [
    ['link' => 'https://www.faceit.com/ru', 'title' => 'FaceIt'],
    ['link' => 'https://starladder.com/ru', 'title' => 'StarLadder'],
];
$factory->define(\App\Models\Tournament::class, function (\Faker\Generator $faker) use ($organizers) {
    $organizer = $faker->randomElement($organizers);
    $holdingAt = $faker->dateTimeBetween('-1 year', '+1 year');
    $qualificationAt = $faker->dateTimeBetween($holdingAt->modify('-100 days'), $holdingAt->modify('-1 day'));

    return [
        'title' => $faker->sentences(1, true),
        'organizer' => $organizer['title'],
        'link' => $organizer['link'],
        'description' => $faker->sentences(4, true),
        'prize_fund' => $faker->numberBetween(1000, 100000),
        'entrance_fee' => $faker->numberBetween(0, 10000),
        'holding_at' => $holdingAt->format('Y-m-d'),
        'qualification_at' => $qualificationAt->format('Y-m-d'),
    ];
});
