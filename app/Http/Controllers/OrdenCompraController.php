<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrdenCompraRequest;
use App\Http\Requests\UpdateOrdenCompraRequest;
use App\Models\OrdenCompra;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Request;

class OrdenCompraController extends Controller
{

    public function index()
    {
        return view('ordenes_compra');
    }

    public function store(Request $request)
    {
        $orden = new OrdenCompra();
        $orden->ordc_gasto = $request->ordc_gasto;
        $orden->ordc_asignacion = $request->ordc_asignacion;
        $orden->ordc_saldo = $request->ordc_saldo;
        $orden->proveedor_id = $request->proveedor_id;
        $orden->descripcion = $request->descripcion;
        $orden->status = 1;
        $orden->creador_id = $request->creador_id;
        $orden->updated_at = Carbon::now();
        $orden->save();

        return $orden;
    }


    public function show(OrdenCompra $ordenCompra)
    {
        return OrdenCompra::with('proveedor')->get();
    }


    public function update(Request $request)
    {
        $orden = OrdenCompra::find($request->id);
        $orden->ordc_gasto = $request->ordc_gasto;
        $orden->ordc_asignacion = $request->ordc_asignacion;
        $orden->ordc_saldo = $request->ordc_saldo;
        $orden->proveedor_id = $request->proveedor_id;
        $orden->descripcion = $request->descripcion;
        $orden->status = $request->status;
        $orden->save();

        return $orden;
    }

}
