<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Account;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Crypt;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
$factory->define(Account::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'category' => 'Netflix',
        'password' => $faker->password, // password
        'code_link' => Uuid::uuid4(),
        'used' => rand(0, 1)
    ];
});
