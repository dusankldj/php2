<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\DB;

    class CategorySpecifications extends Model
    {
        protected $table = 'category_specification';

        public $timestamps = false;

        protected $fillable = ['specification_id','category_id'];

        public function category()
        {
            return $this->belongsTo(Category::class);
        }
    }
