<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function funLogin(Request $request)
    {
        //validar
        $credenciales = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        // Autenticamos
        if (!Auth::attempt($credenciales)) {
            return response()->json(["message" => "Credenciales Incorrectas"]);
        }
        // Obtener el usuario autencicado
        $usuario = $request->user();
        // Generamos token
        $token = $usuario->createToken('Token auth')->plainTextToken;
        // Respondemos
        return response()->json([
            "access_token" => $token,
            "usuario" => $usuario
        ], 201);
    }

    public function funRegister(Request $request)
    {
        //validar
        $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:users",
            "password" => "required|same:c_password",

        ]);

        //guardar
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make ($request->password);
        $usuario->save();

        // Verificación de cuenta por correo

        //generar una respuesta
        return response()->json(["mensaje" => "Usuario Registrado"], 201);
    }

    public function funProfile(Request $request){
        // Obtener el usuario autencicado
        $usuario = $request->user();

        return response()->json($usuario);
    }

    public function funLogout(Request $request){
        $request->user()->tokens()->delete();

        return response()->json(["message"=>"Logout"]);
    }
}
