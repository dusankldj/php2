<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategorySpecifications extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
