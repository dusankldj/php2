<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    protected $table = 'products_specification';

    protected $fillable=[
        'product_id',
        'specification_id',
        'value'
    ];

    public $timestamps = false;

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function specification()
    {
        return $this->hasMany(Specification::class);
    }
}
