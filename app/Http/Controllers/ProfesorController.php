<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfesorController extends Controller
{
    public function index()
    {
        $profesores = Profesor::with('usuario')->get();
        return response()->json($profesores);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:tbl_usuarios',
            'correo' => 'required|email|max:255|unique:tbl_usuarios',
            'contrasena' => 'required|string|min:8',
            'especialidad' => 'required|string|max:255',
            'grado_academico' => 'required|string|max:255'
        ]);

        $usuarioData = $request->only(['nombre', 'apellido', 'dni', 'correo', 'contrasena']);
        $usuarioData['contrasena'] = Hash::make($usuarioData['contrasena']);
        $usuario = Usuario::create($usuarioData);

        $profesorData = $request->only(['especialidad', 'grado_academico']);
        $profesorData['id_profesor'] = $usuario->id_usuario;
        $profesor = Profesor::create($profesorData);

        return response()->json($profesor, 201);
    }

    public function show($id)
    {
        $profesor = Profesor::with('usuario')->findOrFail($id);
        return response()->json($profesor);
    }

    public function update(Request $request, $id)
    {
        $profesor = Profesor::findOrFail($id);
        $usuario = $profesor->usuario;

        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'apellido' => 'sometimes|required|string|max:255',
            'dni' => 'sometimes|required|string|max:20|unique:tbl_usuarios,dni,' . $usuario->id_usuario,
            'correo' => 'sometimes|required|email|max:255|unique:tbl_usuarios,correo,' . $usuario->id_usuario,
            'contrasena' => 'sometimes|required|string|min:8',
            'especialidad' => 'sometimes|required|string|max:255',
            'grado_academico' => 'sometimes|required|string|max:255'
        ]);

        if ($request->has('contrasena')) {
            $validatedData['contrasena'] = Hash::make($request->contrasena);
        }

        $usuario->update($request->only(['nombre', 'apellido', 'dni', 'correo', 'contrasena']));
        $profesor->update($request->only(['especialidad', 'grado_academico']));

        return response()->json($profesor);
    }

    public function destroy($id)
    {
        $profesor = Profesor::findOrFail($id);
        $profesor->usuario->delete();
        $profesor->delete();
        return response()->json(null, 204);
    }
}
