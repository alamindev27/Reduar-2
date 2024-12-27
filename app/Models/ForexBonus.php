<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForexBonus extends Model
{
    protected $guarded = [];
    public function category() {
        return $this->hasOne(ForexBonusCategory::class, 'id', 'category_id');
    }

}
