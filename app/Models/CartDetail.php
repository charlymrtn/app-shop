<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartDetail extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $hidden = ['updated_at','deleted_at'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
