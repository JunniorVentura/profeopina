<?php

namespace App\Http\Controllers;

use App\Models\UsuarioRol;
use Illuminate\Http\Request;

class UsuarioRolController extends Controller
{
    public function index()
    {
        $usuarioRoles = UsuarioRol::with(['usuario', 'rol'])->get();
        return response()->json($usuarioRoles);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_usuario' => 'required|exists:tbl_usuarios,id_usuario',
            'id_rol' => 'required|exists:tbl_roles,id_rol'
        ]);

        $usuarioRol = UsuarioRol::create($validatedData);
        return response()->json($usuarioRol, 201);
    }

    public function show($id_usuario, $id_rol)
    {
        $usuarioRol = UsuarioRol::where([
            ['id_usuario', '=', $id_usuario],
            ['id_rol', '=', $id_rol]
        ])->firstOrFail();

        return response()->json($usuarioRol);
    }

    public function update(Request $request, $id_usuario, $id_rol)
    {
        $usuarioRol = UsuarioRol::where([
            ['id_usuario', '=', $id_usuario],
            ['id_rol', '=', $id_rol]
        ])->firstOrFail();

        $validatedData = $request->validate([
            // Añade validaciones si es necesario
        ]);

        $usuarioRol->update($validatedData);
        return response()->json($usuarioRol);
    }

    public function destroy($id_usuario, $id_rol)
    {
        $usuarioRol = UsuarioRol::where([
            ['id_usuario', '=', $id_usuario],
            ['id_rol', '=', $id_rol]
        ])->firstOrFail();

        $usuarioRol->delete();
        return response()->json(null, 204);
    }
}
