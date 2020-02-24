<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {

    return [
        'subject' => $faker->text(15),
        'user_id' => $faker->numberBetween(1, 2),
        'status_id' => $faker->numberBetween(1, 3),
        'priority_id' => $faker->numberBetween(1,3),
        'completeness' => $faker->numberBetween(0, 95),
        'due_date' => $faker->dateTimeBetween('now', '+1 month')
    ];
});
