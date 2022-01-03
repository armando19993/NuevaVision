<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use App\Models\ProcesoSocio;

class ProcesoSocioExport implements FromView
{

    public function view(): View
    {
        if(Auth::user()->type_user == 1)
        {
            $procesos = ProcesoSocio::with(['socio', 'creador'])->get();
            $socios = true;
        }
        elseif(Auth::user()->type_user > 1 && Auth::user()->type_user < 5)
        {
            $procesos = ProcesoSocio::with(['socio', 'creador'])->where('creador_id', Auth::user()->id)->get();
            $socios = true;
        }
        else
        {
            $procesos = ProcesoSocio::where('socio_id', Auth::user()->socio_id)->get();
            $socios = false;
        }

        return view('exports.procesos_socios', [
            'procesos' => $procesos,
            'socios' => $socios
        ]);
    }
}
