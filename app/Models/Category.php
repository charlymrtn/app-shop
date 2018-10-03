<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
    use SoftDeletes;


    protected $dates = ['deleted_at'];
    protected $hidden = ['deleted_at'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
