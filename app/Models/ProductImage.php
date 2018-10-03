<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    //
    use SoftDeletes;


    protected $dates = ['deleted_at'];
    protected $hidden = ['deleted_at'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getUrlAttribute()
    {
        if(substr($this->image,0,4) === 'http') return $this->image;

        return '/images/products/' . $this->image;
    }
}
