<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Cats\Status;
use App\Models\CartDetail as Detail;
use App\User;

class Cart extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $hidden = ['updated_at','deleted_at'];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function details()
    {
        return $this->hasMany(Detail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDateOrderAttribute()
    {
        $date = $this->order_date;

        return $date->format('d/m/Y');;
    }
}
