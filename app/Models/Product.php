<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $guarded = [];

    public function getCategory()
    {
        return $this->hasOne(Category::class, 'id', 'category_id')->withTrashed();
    }
}
