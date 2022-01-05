<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use App\Models\Proveedor;

class ProveedoresExport implements FromView
{
    public function view(): View
    {
        return view('exports.proveedores', ['proveedores' => Proveedor::with('cuenta')->get()]);
    }
}

