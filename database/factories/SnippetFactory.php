<?php

use Faker\Generator as Faker;
use App\Snippet;
use App\User;

$factory->define(Snippet::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'body' => $faker->text,
        'user_id' => factory(User::class)->create()->id
    ];
});
