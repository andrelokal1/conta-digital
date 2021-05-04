<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'cpf_cnpj' => $faker->numerify('###########'),
        'email' => $faker->email(),
        'password' => 123456,
        'type_user' => $faker->randomElement(['PF','PJ'])
    ];
});