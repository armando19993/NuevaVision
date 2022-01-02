<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEncargadoRequest;
use App\Http\Requests\UpdateEncargadoRequest;
use App\Models\Encargado;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class EncargadoController extends Controller
{

    public function index()
    {
        if(!isset(Auth::user()->name))
        {
            return redirect()->route('login');
        }

        return view('encargados');
    }


    public function store(Request $request)
    {
        $encargado = new Encargado();
        $encargado->cedula = $request->cedula;
        $encargado->nombre = $request->nombre;
        $encargado->telefono = $request->telefono;
        $encargado->movil = $request->movil;
        $encargado->direccion = $request->direccion;
        $encargado->email = $request->email;
        $encargado->status = $request->status;
        $encargado->id_creador = $request->id_creador;
        $encargado->save();

        return $encargado;
    }


    public function show()
    {
        return Encargado::all();
    }


    public function update(Request $request)
    {
        $encargado = Encargado::find($request->id);
        $encargado->cedula = $request->cedula;
        $encargado->nombre = $request->nombre;
        $encargado->telefono = $request->telefono;
        $encargado->movil = $request->movil;
        $encargado->direccion = $request->direccion;
        $encargado->email = $request->email;
        $encargado->status = $request->status;
        $encargado->save();

        return $encargado;
    }

}
