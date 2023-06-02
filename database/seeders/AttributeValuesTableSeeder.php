<?php

namespace Database\Seeders;

use App\Models\AttributeValue;
use Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $sizes = ['small', 'medium', 'large'];
        $colors = ['black', 'blue', 'red', 'orange'];

        foreach($sizes as $size)
        {
            AttributeValue::created([
                'attribute_id' => 1,
                'value' => $size,
                'price' => null,
            ]);
        }

        foreach($colors as $color)
        {
            AttributeValue::created([
                'attribute_id' => 2,
                'value' => $color,
                'price' => null,
            ]);
        }
    }
}
