<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    public function getObligadoAttribute($value)
    {
        if($value == 1){ return $this->attributes['obligado'] = true; }
        else{ return $this->attributes['obligado'] = false; }
    }
    public function getCreditoAttribute($value)
    {
        if($value == 1){ return $this->attributes['credito'] = true; }
        else{ return $this->attributes['credito'] = false; }
    }
    public function getStatusAttribute($value)
    {
        if($value == 1){ return $this->attributes['status'] = true; }
        else{ return $this->attributes['status'] = false; }
    }

    public function cuenta()
    {
        return $this->hasOne(PlanCuenta::class, 'id', 'cuenta_id');
    }
}
