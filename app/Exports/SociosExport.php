<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use App\Models\Socio;

class SociosExport implements FromView
{
    public function view(): View
    {
        if(Auth::user()->tipo_socio == 1)
        {
            $socios = Socio::with('banco')->where('convenio', 1)->where('estado', 1)->get();
        }

        if(Auth::user()->tipo_socio == 2)
        {
            $socios = Socio::with('banco')->where('convenio', 2)->where('estado', 1)->get();
        }

        if(Auth::user()->tipo_socio == 3)
        {
            $socios = Socio::with('banco')->where('estado', 2)->get();
        }

        if(Auth::user()->tipo_socio == 4)
        {
            $socios = Socio::with('banco')->where('estado', 3)->get();
        }

        return view('exports.socios', ['socios' => $socios]);
    }
}
