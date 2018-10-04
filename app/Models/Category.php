<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['name','description'];

    public static $messages = [
        'name.required' => 'El nombre es obligatorio.',
        'name.min' => 'El nombre debe tener al menos 3 carácteres.',
        'description.required' => 'La descripción es obligatorio.',
        'description.max' => 'La descripción no puede exceder los 250 carácteres.'
    ];

    public static $rules = [
        'name' => 'required|min:3',
        'description' => 'required|max:250'
    ];

    protected $dates = ['deleted_at'];
    protected $hidden = ['updated_at','deleted_at'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getFeaturedImageAttribute()
    {
        $featured = $this->products()->first();

        if($featured) return $featured->featured_image;

        return 'images/products/default.jpg';
    }
}
