<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_image';

    protected $fillable = ['product_id', 'thumbnail', 'full'];

    protected $casts = [
        'product_id'    =>  'integer',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
