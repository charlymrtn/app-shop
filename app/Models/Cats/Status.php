<?php

namespace App\Models\Cats;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    //
    use SoftDeletes;

    protected $table = 'cat__status';

    protected $fillable = ['description'];

    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at','updated_at','deleted_at'];

}
