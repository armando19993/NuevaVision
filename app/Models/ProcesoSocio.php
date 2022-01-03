<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcesoSocio extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i:s',
        'updated_at' => 'datetime:d/m/Y H:i:s',
    ];

    public function socio()
    {
        return $this->hasOne(Socio::class, 'id', 'socio_id');
    }

    public function creador()
    {
        return $this->hasOne(User::class, 'id', 'creador_id');
    }
}
