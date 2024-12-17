<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::with('usuario')->get();
        return response()->json($alumnos);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:tbl_usuarios',
            'correo' => 'required|email|max:255|unique:tbl_usuarios',
            'contrasena' => 'required|string|min:8',
            'codigo_alumno' => 'required|string|max:20'
        ]);

        $usuarioData = $request->only(['nombre', 'apellido', 'dni', 'correo', 'contrasena']);
        $usuarioData['contrasena'] = Hash::make($usuarioData['contrasena']);
        $usuario = Usuario::create($usuarioData);

        $alumnoData = $request->only(['codigo_alumno']);
        $alumnoData['id_alumno'] = $usuario->id_usuario;
        $alumno = Alumno::create($alumnoData);

        return response()->json($alumno, 201);
    }

    public function show($id)
    {
        $alumno = Alumno::with('usuario')->findOrFail($id);
        return response()->json($alumno);
    }

    public function update(Request $request, $id)
    {
        $alumno = Alumno::findOrFail($id);
        $usuario = $alumno->usuario;

        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'apellido' => 'sometimes|required|string|max:255',
            'dni' => 'sometimes|required|string|max:20|unique:tbl_usuarios,dni,' . $usuario->id_usuario,
            'correo' => 'sometimes|required|email|max:255|unique:tbl_usuarios,correo,' . $usuario->id_usuario,
            'contrasena' => 'sometimes|required|string|min:8',
            'codigo_alumno' => 'sometimes|required|string|max:20'
        ]);

        if ($request->has('contrasena')) {
            $validatedData['contrasena'] = Hash::make($request->contrasena);
        }

        $usuario->update($request->only(['nombre', 'apellido', 'dni', 'correo', 'contrasena']));
        $alumno->update($request->only(['codigo_alumno']));

        return response()->json($alumno);
    }

    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->usuario->delete();
        $alumno->delete();
        return response()->json(null, 204);
    }
}
