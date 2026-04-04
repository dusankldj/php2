<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Specification extends Model
{
    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'products_specification',
            'specification_id',
            'product_id'
        )->withPivot('value');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
