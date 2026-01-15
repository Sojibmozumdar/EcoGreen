<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $table = 'categories';

    protected $fillable = [
        'name',
        'order',
        'status'
    ];
}
