<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $table = 'attribute_value';

    protected $fillable = [
        'attribute_id',
        'value',
        'price'
    ];

    protected $cast = [
        'attribute_id' => 'integer'
    ];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function productAttribute()
    {
        return $this->belongsToMany(ProductAttribute::class);
    }
}
