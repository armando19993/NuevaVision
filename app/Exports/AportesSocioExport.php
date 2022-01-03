<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

use App\Models\AportesSocio;

class AportesSocioExport implements FromView
{
    public function view(): View
    {
        if(Auth::user()->type_user == 1)
        {
            $aportes = AportesSocio::with('banco', 'socio', 'creador')->get();
            $socios = true;
        }
        elseif(Auth::user()->type_user > 1 && Auth::user()->type_user < 5)
        {
            $aportes = AportesSocio::where('user_id', Auth::user()->id)->with('banco', 'socio', 'creador')->get();
            $socios = true;
        }
        else{
            $aportes = AportesSocio::where('socio_id', Auth::user()->socio_id)->with('banco')->get();
            $socios = false;
        }

        return view('exports.aportes_socio',
        [
            'aportes' => $aportes,
            'socios' => $socios
        ])
    ;
    }
}
