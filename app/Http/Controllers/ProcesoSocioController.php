<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\ProcesoSocio;
use Symfony\Component\HttpFoundation\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProcesoSocioExport;

class ProcesoSocioController extends Controller
{
    
    public function index()
    {
        if(!isset(Auth::user()->name))
        {
            return redirect()->route('login');
        }
        return view('procesos');
    }

    public function store(Request $request)
    {
        $proceso = new ProcesoSocio();
        $proceso->socio_id = $request->socio;
        $proceso->lugar = $request->lugar;
        $proceso->detalle = $request->detalle;
        $proceso->valor = $request->valor;
        $proceso->creador_id = $request->user_id;
        $proceso->save();

        return $proceso;
    }

    public function show( $type_user, $user_id )
    {
        $procesos = ProcesoSocio::query();
        $procesos->with('socio');

        if($type_user != 1)
        {
            if($type_user != 2)
            {
                $procesos->where('creador_id', $user_id);
            }
        }

        $procesos = $procesos->get();

        return $procesos;
    }

  
    public function update(Request $request)
    {
        $proceso = ProcesoSocio::find($request->id);
        $proceso->socio_id = $request->socio;
        $proceso->lugar = $request->lugar;
        $proceso->detalle = $request->detalle;
        $proceso->valor = $request->valor;
        $proceso->save();

        return $proceso;
    }

    public function export()
    {
        $nombre = date('YmdHis').'_procesos.xlsx';
        Excel::store(new ProcesoSocioExport, '/procesos_excels/'.$nombre);

        return $nombre;
    }

    public function mis_procesos()
    {
        if(!isset(Auth::user()->name))
        {
            return redirect()->route('login');
        }

        $procesos = ProcesoSocio::where('socio_id', Auth::user()->id)->get();

        return view('mis_procesos', ['procesos' => $procesos]);
    }

}
