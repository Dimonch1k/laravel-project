<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category_id',
        'image',
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value) => $value ? asset($value) : asset('images/no-img.png')
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}