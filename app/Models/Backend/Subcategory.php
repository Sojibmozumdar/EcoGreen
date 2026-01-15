<?php

namespace App\Models\Backend;

use App\Models\Backend\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subcategory extends Model
{
    protected $table = 'sub_categories';

    protected $fillable = [
        'name',
        'category_id',
        'order',
        'status'
    ];

public function category(): BelongsTo

{ return $this->BelongsTo(Category::class); }

}
