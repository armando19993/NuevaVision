<?php

namespace App\Http\Controllers;

use App\Models\AportesSocio;
use App\Models\Socio;
use Symfony\Component\HttpFoundation\Request;
use App\Exports\AportesSocioExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class AportesSocioController extends Controller
{
  
    public function index(  )
    {
        if(!isset(Auth::user()->name))
        {
            return redirect()->route('login');
        }

        return view('aportes_socios');
    }

   
    public function store(Request $request)
    {
        $aporte = new AportesSocio();
        $aporte->socio_id = $request->socio_id;
        $aporte->user_id = $request->user_id;
        $aporte->tipo_pago = $request->tipo_pago;
        $aporte->banco_id = $request->banco_id;
        $aporte->cuenta = $request->cuenta;
        $aporte->total = $request->total;
        $aporte->estado = 1;
        $aporte->save();

        $socio = Socio::find($request->socio_id);
        $socio->pago = 1;
        $socio->saldo = $request->total;
        $socio->save();

        return $aporte;
    }

   
    public function show( $socio, $type_user, $user_id )
    {
        
        $aportes = AportesSocio::query();
        $aportes->with(['socio', 'banco']);
        if($socio != 0)
        {
            $aportes->where('socio_id', $socio);
        }
        if($type_user != 1)
        {
            if($type_user != 3)
            {
                $aportes->where('user_id', $user_id);
            }
        }

       $aportes = $aportes->get();
        
        return $aportes;
    }

    public function get_aportes( $socio )
    {
        return AportesSocio::where('socio_id', $socio)->with(['socio', 'banco'])->get();
    }

    
    public function update(Request $request)
    {
        $aporte = AportesSocio::find($request->id);
        $aporte->tipo_pago = $request->tipo_pago;
        $aporte->banco_id = $request->banco_id;
        $aporte->cuenta = $request->cuenta;
        $aporte->total = $request->total;
        $aporte->estado = $request->estado;
        $aporte->save();

        return $aporte;
    }

    public function update_estado(Request $request)
    {

        $aporte = AportesSocio::find($request->id);
        $aporte->estado = $request->estado['id'];
        $aporte->save();

        return $aporte;

    }

    public function export() 
    {
        $nombre = date('YmdHis').'_aportes.xlsx';
        Excel::store(new AportesSocioExport, '/aportes_excels/'.$nombre);

        return $nombre;
    }
   
}
