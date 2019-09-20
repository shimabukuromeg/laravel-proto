<?php

use Faker\Generator as Faker;
use App\Eloquent\EloquentCustomerPoint;

$factory->define(EloquentCustomerPoint::class, function (Faker $faker) {
    return [
        'customer_id' => $faker->randomNumber,
        'point' => $faker->randomNumber,
    ];
});
