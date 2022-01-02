<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBancoRequest;
use App\Http\Requests\UpdateBancoRequest;
use App\Models\Banco;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class BancoController extends Controller
{

    public function index()
    {
        if(!isset(Auth::user()->name))
        {
            return redirect()->route('login');
        }

        return view('bancos');
    }

    public function store(Request $request)
    {
        $banco = new Banco();
        $banco->nombre = $request->nombre;
        $banco->siglas = $request->siglas;
        $banco->debe = $request->debe;
        $banco->haber = $request->haber;
        $banco->cuenta = $request->cuenta;
        $banco->convenio = $request->convenio;
        $banco->status = $request->status;
        $banco->save();
        return $banco;
    }

    public function show()
    {
        return Banco::all();
    }


    public function update(Request $request)
    {
        $banco = Banco::find($request->id);
        $banco->nombre = $request->nombre;
        $banco->siglas = $request->siglas;
        $banco->debe = $request->debe;
        $banco->haber = $request->haber;
        $banco->cuenta = $request->cuenta;
        $banco->convenio = $request->convenio;
        $banco->status = $request->status;
        $banco->save();
        return $banco;
    }
}
