<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'tags',
        'status',
        'featured_image',

    ];

    // attribute custing

    protected $casts = [
        'tags' =>'array',
    ];
}
