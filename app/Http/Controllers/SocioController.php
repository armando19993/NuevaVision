<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSocioRequest;
use App\Http\Requests\UpdateSocioRequest;
use App\Models\Socio;
use App\Models\Banco;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use Barryvdh\DomPDF\Facade as PDF;

class SocioController extends Controller
{


    public function index()
    {
        if(!isset(Auth::user()->name))
        {
            return redirect()->route('login');
        }
        return view('socios');
    }

    public function socios_tipo( $valor )
    {
        $socio = Auth::user();
        $socio->tipo_socio = $valor;
        $socio->save();

        return redirect()->route('socios');
    }

    public function store(Request $request)
    {
        $banco = Banco::find($request->banco);
        $socio = new Socio();
        $socio->tipo_documento = $request->tipo_documento;
        $socio->documento = $request->documento;
        $socio->nombres = $request->nombres;
        $socio->direccion = $request->direccion;
        $socio->telefono = $request->telefono;
        $socio->movil = $request->movil;
        $socio->correo = $request->correo;
        $socio->foto = $request->perfil;
        $socio->nombres_referencia = $request->nombre_referencia;
        $socio->movil_referencia = $request->movil_referencia;
        $socio->fuerza = $request->fuerza;
        $socio->estado = $request->estado;
        $socio->observacion = $request->observaciones;
        $socio->mies = $request->mies;
        $socio->mt = $request->mt;
        $socio->user_id = $request->user_id;
        $socio->cuenta = $request->cuenta;
        $socio->documento_pdf = $request->pdf;
        $socio->convenio = $banco->convenio;
        $socio->banco_id = $request->banco;
        $nombre = 'socio_'.date('YmdHis').'_ficha.pdf';
        $socio->ficha_pdf = $nombre;
        $socio->pago = 2;
        $socio->save();
        
        $this->storePdf($socio, $nombre);

        return $socio;
    }

    public function show( )
    {
        if(Auth::user()->tipo_socio == 1)
        {
            return Socio::with('banco')->where('convenio', 1)->where('estado', 1)->get();
        }

        if(Auth::user()->tipo_socio == 2)
        {
            return Socio::with('banco')->where('convenio', 2)->where('estado', 1)->get();
        }

        if(Auth::user()->tipo_socio == 3)
        {
            return Socio::with('banco')->where('estado', 2)->get();
        }

        if(Auth::user()->tipo_socio == 4)
        {
            return Socio::with('banco')->where('estado', 3)->get();
        }
        
    }


    public function update(Request $request)
    {
        $banco = $request->banco;

        if(is_array($request->banco))
        {
            $convenio = $banco['convenio'];
            $id = $banco['id'];
        }
        else{
            $banco = Banco::find($request->banco);
            $convenio = $banco->convenio;
            $id = $request->banco;
        }

        if(is_array($request->fuerza))
        {
            $fuerza = $request->fuerza['id'];
        }
        else{
            $fuerza = $request->fuerza;
        }

        if(is_array($request->estado))
        {
            $estado = $request->estado['id'];
        }
        else{
            $estado = $request->estado;
        }

        if(is_array($request->pago))
        {
            $pago = $request->pago['id'];
        }
        else{
            $pago = $request->pago;
        }

        $socio = Socio::find($request->id);
        $socio->tipo_documento = $request->tipo_documento;
        $socio->documento = $request->documento;
        $socio->nombres = $request->nombres;
        $socio->direccion = $request->direccion;
        $socio->telefono = $request->telefono;
        $socio->movil = $request->movil;
        $socio->correo = $request->correo;
        if($request->perfil != null){$socio->foto = $request->perfil;}
        $socio->nombres_referencia = $request->nombre_referencia;
        $socio->movil_referencia = $request->movil_referencia;
        $socio->fuerza = $fuerza;
        $socio->estado = $estado;
        $socio->observacion = $request->observaciones;
        $socio->mies = $request->mies;
        $socio->mt = $request->mt;
        $socio->cuenta = $request->cuenta;
        if($request->pdf != null){$socio->documento_pdf = $request->pdf;}
        $socio->convenio = $convenio;
        $socio->banco_id = $id;
        $nombre = 'socio_'.date('YmdHis').'_ficha.pdf';
        $socio->ficha_pdf = $nombre;
        $socio->pago = $pago;
        $socio->save();
        
        $this->storePdf($socio, $nombre);

        return $socio;
    }


    public function get_socio($socio)
    {
        return Socio::where('id', $socio)->with('banco')->first();
    }

    public function list_all()
    {
        return Socio::all();
    }

    public function upload_imagen( Request $request )
    {
        //obtenemos el campo file definido en el formulario
       $file = $request->file('file');

       //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();
       $extension = explode('.', $nombre);
       $nombre = date("YmdHis").".".$extension[1];
       

       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put($nombre,  \File::get($file));

       return $nombre;
    }

    public function upload_documento( Request $request )
    {
       $file = $request->file('file');

       //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();
       $extension = explode('.', $nombre);
       $nombre = date("YmdHis")."_documento.".$extension[1];
       
       \Storage::disk('local')->put($nombre,  \File::get($file));

       return $nombre;
    }

    public function storePdf( $array, $nombre )
    {
        $data = PDF::loadView('ficha_socio', ['socio' => $array])
        ->save(public_path('fichas_socios/') . $nombre);
    }
}
