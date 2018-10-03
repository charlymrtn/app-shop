<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Cats\Status;

class Cart extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $hidden = ['deleted_at'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
