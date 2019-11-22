<?php

use Faker\Generator as Faker;
use App\Snippet;

$factory->define(Snippet::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'body' => $faker->text,
    ];
});
