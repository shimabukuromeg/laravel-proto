<?php
declare(strict_types=1);

use Faker\Generator as Faker;
use App\Eloquent\EloquentCustomer;

$factory->define(EloquentCustomer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
