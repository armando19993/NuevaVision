<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function login(Request $request)
    {
        $val = User::where('user', $request->email)->orWhere('email', $request->email)->count();

        if($val > 0)
        {
            $val = User::where('user', $request->email)->orWhere('email', $request->email)->where('password', sha1($request->password))->count();

            if($val > 0)
            {
                $val = User::where('user', $request->email)->orWhere('email', $request->email)->where('password', sha1($request->password))->first();

                Auth::loginUsingId($val->id);
                return redirect()->route('home');
            }
        }
        else{
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }



    public function list()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->user = $request->user;
        $usuario->password = sha1($request->password);
        $usuario->type_user = $request->type_user;
        $usuario->status_user = $request->status_user;
        $usuario->save();
        return $usuario;
    }

    public function update(Request $request)
    {
        $usuario = User::find($request->id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->user = $request->user;
        $usuario->type_user = $request->type_user;
        $usuario->status_user = $request->status_user;
        if($request->password != null)
        {
            $usuario->password = sha1($request->password);
        }
        $usuario->save();
        return $usuario;

    }

    public function cambiar_tipo_socios( $valor )
    {
        $user = Auth::user();
        $user->tipo_socios = $valor;
        $user->save();

        return redirect()->route('socios');
    }
}
