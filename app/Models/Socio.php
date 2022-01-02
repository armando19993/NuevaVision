<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i:s',
        'updated_at' => 'datetime:d/m/Y H:i:s',
    ];

    public function banco()
    {
        return $this->hasOne(Banco::class, 'id', 'banco_id');
    }

    public function getEstadoAttribute($value)
    {
        if($value == 1){ 
            $valor = ['id' => $value, 'value' => 'Activo', 'color' => 'success' ];
        }
        if($value == 2){ 
            $valor = ['id' => $value, 'value' => 'Inactivo', 'color' => 'danger' ];
        }
        if($value == 3){ 
            $valor = ['id' => $value, 'value' => 'Supendido', 'color' => 'warning' ];
        }

        return $this->attributes['estado_data'] = $valor;
    }

    public function getPagoAttribute($value)
    {
        if($value == 1){ 
            $valor = ['id' => $value, 'value' => 'Cancelado', 'color' => 'success' ];
        }
        elseif($value == 2){ 
            $valor = ['id' => $value, 'value' => 'Pendiente', 'color' => 'danger' ];
        }
        else{
            $valor = null;
        }

        return $this->attributes['pago_data'] = $valor;
    }

    public function getFuerzaAttribute($value)
    {
        if($value == 1){ 
            $valor = ['id' => $value, 'value' => 'Militar'];
        }
        if($value == 2){ 
            $valor = ['id' => $value, 'value' => 'Aerea'];
        }
        if($value == 3){ 
            $valor = ['id' => $value, 'value' => 'Maritima'];
        }

        return $this->attributes['pago_data'] = $valor;
    }

    public function getDocumentoPdfAttribute($value)
    {
        if(!is_array($value))
        {
            $valor = ['url' => '/documentos_imagenes/'.$value, 'valor' => $value];

        return $this->attributes['documento_pdf'] = $valor;
        }
        
    }

    public function getFichaPdfAttribute($value)
    {
        if(!is_array($value))
        {
            $valor = ['url' => '/fichas_socios/'.$value, 'valor' => $value];

        return $this->attributes['ficha_pdf'] = $valor;
        }
    }

    public function getMiesAttribute($value)
    {
        if($value == 1){ return $this->attributes['mies'] = true; }
        else{ return $this->attributes['mies'] = false; }
    }

    public function getMtAttribute($value)
    {
        if($value == 1){ return $this->attributes['mt'] = true; }
        else{ return $this->attributes['mt'] = false; }
    }
}
