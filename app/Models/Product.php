<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['name','description','price','long_description'];

    public static $messages = [
        'name.required' => 'El nombre es obligatorio.',
        'name.min' => 'El nombre debe tener al menos 3 carácteres.',
        'description.required' => 'La descripción es obligatorio.',
        'description.max' => 'La descripción no puede exceder los 50 carácteres.',
        'price.required' => 'El precio es obligatorio.',
        'price.numeric' => 'El precio tiene que ser númerico.',
        'price.min' => 'El precio no puede ser menor a cero.',
    ];

    public static $rules = [
        'name' => 'required|min:3',
        'description' => 'required|max:100',
        'price' => 'required|numeric|min:0'
    ];

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
