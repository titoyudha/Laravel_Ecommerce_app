<?php

namespace Database\Seeders;

use App\Models\ModelsAttribute as Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
       //
       Attribute::created([
        'code'          =>  'size',
        'name'          =>  'Size',
        'frontend_type' =>  'select',
        'is_filterable' =>  1,
        'is_required'   =>  1,
       ]);

       Attribute::created([
        'code'          =>  'color',
        'name'          =>  'Color',
        'frontend_type' =>  'select',
        'is_filterable' =>  1,
        'is_required'   =>  1,
       ]);
    }
}
