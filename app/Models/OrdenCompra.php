<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
      ];

    public function proveedor()
    {
        return $this->hasOne(Proveedor::class, 'id', 'proveedor_id');
    }
    public function getStatusAttribute($value)
    {
        if($value == 1){ return $this->attributes['status'] = true; }
        else{ return $this->attributes['status'] = false; }
    }
}
