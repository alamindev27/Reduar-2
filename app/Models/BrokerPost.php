<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerPost extends Model
{
    protected $guarded = [];
    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function subcategory() {
        return $this->hasOne(SubCategory::class, 'id', 'subcategory_id');
    }
}
