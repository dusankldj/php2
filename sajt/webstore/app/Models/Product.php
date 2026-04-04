<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Specification;

class Product extends Model
{

    protected $fillable=[
        'name',
        'price',
        'discount_price',
        'description',
        'stock',
        'category_id',
        'updated_at'
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function specifications()
    {
        return $this->belongsToMany(
            Specification::class, //tabela s kojom pravimo relaciju
            'products_specification', //ime medjutabele
            'product_id', //FK
            'specification_id'  //FK
        )->withPivot('value');  //pivot vrednost(znaci da postoji i vrednost)
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function thumbnail()
    {
        return $this->hasOne(Image::class)->where('is_thumbnail', 1);
    }

    public function gallery()
    {
        return $this->hasMany(Image::class)->where('is_thumbnail', 0);
    }
}
