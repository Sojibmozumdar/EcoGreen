<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $table = 'categoreis';

    protected $fillable = [
        'name',
        'order',
        'status'
    ];
}
