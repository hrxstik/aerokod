<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductCategory extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['title', 'parent_id'];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(__CLASS__, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(__CLASS__, 'parent_id')->whereNull('deleted_at');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id')->whereNull('deleted_at');
    }
    protected static function booted(): void
    {
        static::deleted(function (ProductCategory $category) {
            $category->products()->delete();
        });

        static::restored(function (ProductCategory $category) {
            $category->products()->restore();
        });
    }
}
