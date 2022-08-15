<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'name', 
        'price', 
        'category_id',
        'description',
        'rating',
        'images',
        'bestSeller',
    ];

    protected $casts = 
    [
        'images' => 'array'
    ];

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }


}
