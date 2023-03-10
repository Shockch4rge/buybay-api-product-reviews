<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        "product_id",
        "author_id",
        "title",
        "description",
        "rating",
    ];
}
