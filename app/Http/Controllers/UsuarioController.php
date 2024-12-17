<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:tbl_usuarios',
            'correo' => 'required|email|max:255|unique:tbl_usuarios',
            'contrasena' => 'required|string|min:8',
        ]);

        $validatedData['contrasena'] = Hash::make($request->contrasena);

        $usuario = Usuario::create($validatedData);
        return response()->json($usuario, 201);
    }

    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return response()->json($usuario);
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'apellido' => 'sometimes|required|string|max:255',
            'dni' => 'sometimes|required|string|max:20|unique:tbl_usuarios,dni,' . $usuario->id,
            'correo' => 'sometimes|required|email|max:255|unique:tbl_usuarios,correo,' . $usuario->id,
            'contrasena' => 'sometimes|required|string|min:8',
        ]);

        if ($request->has('contrasena')) {
            $validatedData['contrasena'] = Hash::make($request->contrasena);
        }

        $usuario->update($validatedData);
        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return response()->json(null, 204);
    }
}
