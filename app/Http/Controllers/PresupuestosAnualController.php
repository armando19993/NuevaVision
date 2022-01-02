<?php

namespace App\Http\Controllers;

use App\Models\PresupuestosAnual;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class PresupuestosAnualController extends Controller
{

    public function index()
    {
        if(!isset(Auth::user()->name))
        {
            return redirect()->route('login');
        }

        return view('presupuesto_anual');
    }

    public function store(Request $request)
    {
        $presupuesto = new PresupuestosAnual();
        $presupuesto->tipo = "ANUAL";
        $presupuesto->asignacion = $request->asignacion;
        $presupuesto->codigo = $request->codigo;
        $presupuesto->nombre = $request->nombre;
        $presupuesto->gasto = 0;
        $presupuesto->saldo = $request->asignacion;
        $presupuesto->cuenta = $request->cuenta;
        $presupuesto->id_creador = $request->id_creador;
        $presupuesto->periodo = $request->periodo;
        $presupuesto->save();

        return $presupuesto;
    }

    public function show()
    {
        return PresupuestosAnual::all();
    }


    public function update(Request $request)
    {
        $presupuesto = PresupuestosAnual::find($request->id);
        $presupuesto->codigo = $request->codigo;
        $presupuesto->asignacion = $request->asignacion;
        $presupuesto->nombre = $request->nombre;
        $presupuesto->cuenta = $request->cuenta;
        $presupuesto->periodo = $request->periodo;
        $presupuesto->save();

        return $presupuesto;
    }

}
