<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\RegistrarRequest;

use App\Models\User;


class Usuario extends Controller
{
    public function index(){

        if(Auth::check()){
            return redirect()->back();
        }

        return view('login');
    }

    public function registrarse(){

        if(Auth::check()){
            return redirect()->back();
        }

        return view('registrar');
    }

    public function registrar(RegistrarRequest $request){


        $input = $request->input();       

        $input['password'] = Hash::make($input['contrasena_inicio']);
        $input['email']    = $input['email'];

        $usuario = User::create([
            'nombre' => $input['nombre'],
            'email' => $input['email'] ,
            'password' => $input['password'],
        ]);


        $usuario->save();
        $credenciales['email'] = $input['email'];
        $credenciales['password'] = $input['contrasena_inicio'];

        
        if (Auth::attempt($credenciales)) {
            return redirect()->intended(route('productos-index'));
        }
    }

    public function login (Request $request){

        

        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
        ]);
        $input = $request->all();

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

    
        $credenciales['email'] = $input['email'];
        $credenciales['password'] = $input['password'];
        
        if (Auth::attempt($credenciales)) {
            return redirect()->route('productos-index');

        }

        return redirect()->back()->withErrors(['error']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();

        return redirect()->back();
    }
}
