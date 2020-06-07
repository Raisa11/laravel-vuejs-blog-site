<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\AdminCategory::class, function (Faker $faker) {
    return [
        'cat_name'=>$faker->word,
        'cat_desc'=>$faker->sentence,
    ];
});
