<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'          =>  $faker->name,
        'description'   =>  $faker->realText(100),
        'parent_id'     =>  1,
        'menu'          =>  1,
    ];
});
