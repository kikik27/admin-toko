<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'stock',
        'is_active'
    ];

    protected $keyType = 'string';

    protected $primaryKey = 'id';

    protected static function booted(): void
    {
        static::creating(function (Product $product) {
            $product->id = Str::uuid();
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}