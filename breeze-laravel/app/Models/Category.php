<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'parent_id', 'slug'];
    protected function shortDescription(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => Str::words($attributes['description'], 5, '...'),
        );
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value) => $value ? asset($value) : asset('images/no-img.png')
        );
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = $category->generateSlug();
        });

        static::updating(function ($category) {
            $category->slug = $category->generateSlug();
        });
    }

    public function generateSlug()
    {
        $slug = Str::slug($this->name);

        $originalSlug = $slug;
        $count = 1;

        while (self::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        return $slug;
    }
}