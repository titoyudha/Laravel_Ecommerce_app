<?php

namespace Database\Seeders;

use App\Models\Models\Admin;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        Admin::create([
            'name' => $faker->name(),
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
    }
}
