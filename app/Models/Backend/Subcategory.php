<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subcategory extends Model
{
    protected $table = 'sub_categories';

    protected $fillable = [
        'name',
        'category_id',
        'order',
        'status',
    ];

    /**
     * 🔹 Subcategory belongs to Category
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * 🔹 Subcategory has many Products
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'sub_category_id');
    }
}
