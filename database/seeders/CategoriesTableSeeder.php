<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Factory;
use Illuminate\Support\Str;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::create([
            'name'          =>  'Root',
            'slug'          =>  Str::uuid(),
            'description'   =>  'This is the root category, don\'t delete this one',
            'parent_id'     =>  null,
            'menu'          =>  0,
        ]);
        Category::factory()->count(10)->create();
    }
}
