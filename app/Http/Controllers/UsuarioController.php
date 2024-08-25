<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   // El modelo User esta asociado a la tabla users
        $usuarios = User::get(); // Select * from users

        // DB::select("");

        // $table_pívot = DB::table("role_user")->join ('users', 'user.id', "role_user.user_id")->where("user_id", "=", 2)->get();

        return response()->json($usuarios, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioRequest $request)
    {
        // $nombre = "admin' or 1=1"; //request-name
        // DB::insert("insert into users (name, email) values(?, ?)", [$nombre, $request->email]);
        /* $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required"
        ]);
        */

        $usuario = new User();
        $usuario -> name = $request->name;
        $usuario -> email = $request->email;
        $usuario -> password = $request->password;
        $usuario->save();

        return response()->json(["message"=>"Usuario registrado correctamente"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = User::find($id);
        return response()->json($usuario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email,$id",
            "password" => "required"
        ]);

        $usuario = User::find($id);
        $usuario -> name = $request->name;
        $usuario -> email = $request->email;
        $usuario -> password = $request->password;
        $usuario -> update();

        return response()->json(["message"=> "Usuario actualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = User::find($id);
        $usuario ->delete();
        return response()->json(["message"=> "Usuario eliminado"]);
    }
}
