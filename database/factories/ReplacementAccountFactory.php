<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ReplacementAccount;
use Faker\Generator as Faker;

$factory->define(ReplacementAccount::class, function (Faker $faker) {
    return [
        'account_id' => null,
        'category' => 'Netflix',
        'used' => false,
        'email' => $faker->unique()->safeEmail,
        'password' => $faker->password, // password
    ];
});
