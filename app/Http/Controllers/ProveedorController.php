<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProveedorRequest;
use App\Http\Requests\UpdateProveedorRequest;
use App\Models\Proveedor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use App\Exports\ProveedoresExport;
use Maatwebsite\Excel\Facades\Excel;

class ProveedorController extends Controller
{
    public function index()
    {
        if(!isset(Auth::user()->name))
        {
            return redirect()->route('login');
        }
        return view('proveedores');
    }


    public function store(Request $request)
    {
        $proveedor = new Proveedor();
        $proveedor->documento = $request->documento;
        $proveedor->razon_social = $request->razon_social;
        $proveedor->observaciones = $request->observaciones;
        $proveedor->telefono = $request->telefono;
        $proveedor->movil = $request->movil;
        $proveedor->correo = $request->correo;
        $proveedor->credito = $request->credito;
        $proveedor->tiempo_credito = $request->tiempo_credito;
        $proveedor->obligado = $request->obligado;
        $proveedor->status = 1;
        $proveedor->creador_id = $request->creador_id;
        $proveedor->cuenta_id = $request->cuenta;
        $proveedor->serie = $request->serie;
        $proveedor->secuencia = $request->secuencia;
        $proveedor->autorizacion = $request->autorizacion;
        $proveedor->caducidad = Carbon::parse($request->caducidad)->format('Y-m-d');
        $proveedor->save();

        return $proveedor;
    }


    public function show()
    {
        return Proveedor::all();
    }


    public function update(Request $request)
    {
        $proveedor = Proveedor::find($request->id);
        $proveedor->documento = $request->documento;
        $proveedor->razon_social = $request->razon_social;
        $proveedor->observaciones = $request->observaciones;
        $proveedor->telefono = $request->telefono;
        $proveedor->movil = $request->movil;
        $proveedor->correo = $request->correo;
        $proveedor->credito = $request->credito;
        $proveedor->tiempo_credito = $request->tiempo_credito;
        $proveedor->obligado = $request->obligado;
        $proveedor->status = $request->status;
        $proveedor->cuenta_id = $request->cuenta;
        $proveedor->serie = $request->serie;
        $proveedor->secuencia = $request->secuencia;
        $proveedor->autorizacion = $request->autorizacion;
        $proveedor->caducidad = Carbon::parse($request->caducidad)->format('Y-m-d');
        $proveedor->save();

        return $proveedor;
    }

    public function export()
    {
        $nombre = date('YmdHis').'_proveedores.xlsx';
        Excel::store(new ProveedoresExport, '/proveedores_excels/'.$nombre);

        return $nombre;
    }

}
