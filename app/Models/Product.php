<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $hidden = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getFeaturedImageAttribute()
    {
        $featured = $this->images()->where('featured',true)->first();
        if(!$featured) $featured = $this->images()->first();

        if($featured) return $featured->url;

        return 'images/products/default.jpg';
    }
}
