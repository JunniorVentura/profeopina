<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return response()->json($cursos);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codigo_curso' => 'required|string|max:10',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:500'
        ]);

        $curso = Curso::create($validatedData);
        return response()->json($curso, 201);
    }

    public function show($id)
    {
        $curso = Curso::findOrFail($id);
        return response()->json($curso);
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);

        $validatedData = $request->validate([
            'codigo_curso' => 'sometimes|required|string|max:10',
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'nullable|string|max:500'
        ]);

        $curso->update($validatedData);
        return response()->json($curso);
    }

    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();
        return response()->json(null, 204);
    }
}
