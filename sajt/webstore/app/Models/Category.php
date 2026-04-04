<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'parent_id'];

    //category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    //subcategory
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function specifications()
    {
        return $this->belongsToMany(Specification::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
