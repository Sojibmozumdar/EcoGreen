<?php

namespace App\Models\Backend;

use App\Models\Backend\Upload;
use App\Models\Backend\Category;
use App\Models\Backend\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'category_id',
        'sub_category_id',
        'price',
        'discount',
        'quantity',
        'short_description',
        'description',
        'product_details',
        'delivery_policy',
        'return_policy',
        'status',
    ];

    // ✅ Product belongs to Category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // ✅ Product belongs to Subcategory
    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class, 'sub_category_id');
    }

    // ✅ Product has many Uploads (images)
    public function uploads(): HasMany
    {
        return $this->hasMany(Upload::class);
    }
}
