<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Profile;
use App\Account;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'city' => $faker->city,
        'phone' => $faker->unique()->phoneNumber()
    ];
});

$factory->define(Account::class, function (Faker $faker) {
    return [
        'profile_id' => Profile::all()->unique()->random()->id,
        'amount' => $faker->numberBetween($min = 1000, $max = 1000000),
        'remark' => Str::random(10)
    ];
});

