<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAporteRequest;
use App\Http\Requests\UpdateAporteRequest;
use App\Models\Aporte;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;


class AporteController extends Controller
{

    public function index()
    {
        if(!isset(Auth::user()->name))
        {
            return redirect()->route('login');
        }

        return view('aportes');
    }


    public function store(Request $request)
    {
        $aporte = new Aporte();
        $aporte->id_usuario = $request->usuario_id;
        $aporte->ano = $request->ano;
        $aporte->tipo_aporte = $request->tipo_aporte;
        $aporte->aporte = $request->aporte;
        $aporte->save();

        return $aporte;
    }

    public function show()
    {
        return Aporte::all();
    }

    public function update(Request $request)
    {
        $aporte = Aporte::find($request->id);
        $aporte->ano = $request->ano;
        $aporte->tipo_aporte = $request->tipo_aporte;
        $aporte->aporte = $request->aporte;
        $aporte->save();
    }

}
