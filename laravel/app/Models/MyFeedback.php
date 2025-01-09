<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MyFeedback extends Model
{
    use HasFactory;


    protected $fillable = ['sender_name', 'sender_email', 'message', 'rating'];

    protected function shortMessage(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => Str::words($attributes['message'], 15, '...'),
        );
    }
}