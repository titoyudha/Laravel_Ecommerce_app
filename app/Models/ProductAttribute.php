<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

     protected $table = 'product_attributes';

     protected $fillable = ['product_id', 'quantity', 'price'];

     public function products()
     {
        return $this->belongsTo(Product::class);
     }

     public function attributes()
     {
        return $this->belongsTo(Attribute::class);
     }

}
