<?php

namespace App\Http\Controllers;


use App\Models\PlanCuenta;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class PlanCuentaController extends Controller
{

    public function index()
    {
        if(!isset(Auth::user()->name))
        {
            return redirect()->route('login');
        }

        return view('plan_cuentas');
    }


    public function store(Request $request)
    {
        $plan = new PlanCuenta();

        $plan->codigo = $request->codigo;
        $plan->cedula_presupuestaria = $request->cedula_presupuestaria;
        $plan->cuenta = $request->cuenta;
        if($request->debe_inicial != null) {
            $plan->debe_inicial = $request->debe_inicial;
            $plan->debe = $request->debe_inicial;
        }
        else{
            $plan->debe_inicial = 0;
            $plan->debe = 0;
        }

        if($request->haber_inicial != null){
            $plan->haber_inicial = $request->haber_inicial;
            $plan->haber = $request->haber_inicial;
        }
        else{
            $plan->haber_inicial = 0;
            $plan->haber = 0;
        }
        $plan->save();

        return $plan;
    }


    public function show()
    {
        return PlanCuenta::all();
    }


    public function update(Request $request)
    {
        $plan = PlanCuenta::find($request->id);
        $plan->codigo = $request->codigo;
        $plan->cedula_presupuestaria = $request->cedula_presupuestaria;
        $plan->cuenta = $request->cuenta;
        $plan->debe_inicial = $request->debe_inicial;
        $plan->debe = $request->debe;
        $plan->haber_inicial = $request->haber_inicial;
        $plan->haber = $request->haber;
        $plan->save();

        return $plan;
    }

}
