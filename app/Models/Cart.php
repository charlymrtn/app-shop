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

    protected $dates = ['deleted_at','order_date','arrived_date'];
    protected $hidden = ['deleted_at'];

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

        return $date->format('d/m/Y');
    }

    public function getDateUpdatedAttribute()
    {
        $date = $this->updated_at;

        return $date->format('d/m/Y');
    }

    public function getTotalAttribute()
    {
        $total = 0;
        foreach ($this->details as $detail) {
            # code...
            $total += $detail->quantity * $detail->price;
        }

        return $total;
    }

    public function getPiecesAttribute()
    {
        $pieces = 0;
        foreach ($this->details as $detail) {
            # code...
            $pieces += $detail->quantity;
        }

        return $pieces;
    }

    public function getStatusNameAttribute()
    {
        $status = Status::find($this->status);

        if($status->id ==1) return 'Activo';
        if($status->id ==2) return 'Pendiente';
        if($status->id ==3) return 'Aprobado';
        if($status->id ==4) return 'Cancelado';
        if($status->id ==5) return 'Entregado';

        if($status) return $status;

        return 'Desconocido';
    }

    public function getClientNameAttribute()
    {
        $client = User::find($this->user_id);

        $client = $client->name;

        if($client) return $client;

        return 'Desconocido';
    }
}
