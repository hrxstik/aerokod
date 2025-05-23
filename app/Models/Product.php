<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'category_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
