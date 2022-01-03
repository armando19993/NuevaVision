<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AportesSocio extends Model
{
    use HasFactory;
    
    protected $casts = [
        'created_at' => 'datetime:d/m/Y',
        'updated_at' => 'datetime:d/m/Y',
    ];
    public function socio()
    {
        return $this->hasOne(Socio::class, 'id', 'socio_id');
    }

    public function banco()
    {
        return $this->hasOne(Banco::class, 'id', 'banco_id');
    }

    public function creador()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getTipoPagoAttribute($value)
    {
        if($value == 1){ 
            $valor = ['id' => $value, 'value' => 'EFECTIVO'];
        }
        if($value == 2){ 
            $valor = ['id' => $value, 'value' => 'CHEQUE'];
        }
        if($value == 3){ 
            $valor = ['id' => $value, 'value' => 'DEPOSITO'];
        }
        if($value == 4){ 
            $valor = ['id' => $value, 'value' => 'TRANSFERENCIA'];
        }

        return $this->attributes['pago_data'] = $valor;
    }

    public function getEstadoAttribute($value)
    {
        if($value == 1){ 
            $valor = ['id' => $value, 'value' => 'ACTIVA', 'color' => 'success', 'class' => 'badge bg-success' ];
        }
        if($value == 2){ 
            $valor = ['id' => $value, 'value' => 'ANULADA', 'color' => 'danger', 'class' => 'badge bg-danger' ];
        }

        return $this->attributes['estado_data'] = $valor;
    }
}
