<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Upload extends Model
{
    protected $fillable = ['product_id', 'path'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // Accessor to get full URL
    public function getPhotoUrlAttribute()
    {
        return asset('storage/' . $this->path);
    }
}
