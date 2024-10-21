<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Category extends Model
{
    use HasFactory;
    protected $keyType = 'string';

    protected static function booted(): void
    {
        static::creating(function (Category $category) {
            $category->id = Str::uuid();
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}