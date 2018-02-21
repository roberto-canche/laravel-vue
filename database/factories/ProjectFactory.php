<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function(Faker $faker){
    return [
        'assigned_by' => $faker->name,
        'owner' => $faker->name,
        'name' => $faker->company,
        'description' => $faker->sentence(50),
        'cost' => $faker->randomNumber(6)
    ];
});