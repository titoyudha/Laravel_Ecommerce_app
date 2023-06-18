<?php

namespace Database\Factories;

use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->unique()->slug(),
            'parent_id' => 1,
            'menu' => 0,
        ];
    }
}






