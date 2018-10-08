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

    public function getNameAttribute()
    {

        if($this->id ==1) return 'Activo';
        if($this->id ==2) return 'Pendiente';
        if($this->id ==3) return 'Aprobado';
        if($this->id ==4) return 'Cancelado';
        if($this->id ==5) return 'Entregado';

        if($status) return $status;

        return 'Desconocido';
    }

}
