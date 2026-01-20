<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'order',
        'status',
    ];

    /**
     * 🔹 Category has many Subcategories
     */
    public function subcategories(): HasMany
    {
        return $this->hasMany(Subcategory::class, 'category_id');
    }

    /**
     * 🔹 Category has many Products (through subcategory or direct)
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
