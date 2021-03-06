<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Role;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

// $factory->define(Role::class, function (Faker $faker) {
//     return [
//         'name' => $faker->userName,
//         'description' => $faker->text
//     ];
// });

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'role_id' => 2,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('user'), // password
        'remember_token' => Str::random(10),
    ];
});
