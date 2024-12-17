<?php

namespace App\Http\Controllers;

use App\Models\Encuesta;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    public function index()
    {
        $encuestas = Encuesta::with(['usuario', 'profesor', 'curso'])->get();
        return response()->json($encuestas);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_usuario' => 'required|exists:tbl_usuarios,id_usuario',
            'id_profesor' => 'required|exists:tbl_profesores,id_profesor',
            'id_curso' => 'required|exists:tbl_cursos,id_curso',
            'metodologia' => 'required|integer|between:1,5',
            'dificultad' => 'required|integer|between:1,5',
            'volverias_llevar' => 'required|boolean',
            'uso_libros' => 'required|boolean',
            'asistencia_obligatoria' => 'required|boolean',
            'como_te_fue' => 'nullable|string|max:255',
            'texto_reseña' => 'required|string|max:1000',
        ]);

        $encuesta = Encuesta::create($validatedData);
        return response()->json($encuesta, 201);
    }

    public function show($id)
    {
        $encuesta = Encuesta::with(['usuario', 'profesor', 'curso'])->findOrFail($id);
        return response()->json($encuesta);
    }

    public function update(Request $request, $id)
    {
        $encuesta = Encuesta::findOrFail($id);

        $validatedData = $request->validate([
            'metodologia' => 'sometimes|required|integer|between:1,5',
            'dificultad' => 'sometimes|required|integer|between:1,5',
            'volverias_llevar' => 'sometimes|required|boolean',
            'uso_libros' => 'sometimes|required|boolean',
            'asistencia_obligatoria' => 'sometimes|required|boolean',
            'como_te_fue' => 'nullable|string|max:255',
            'texto_reseña' => 'sometimes|required|string|max:1000',
        ]);

        $encuesta->update($validatedData);
        return response()->json($encuesta);
    }

    public function destroy($id)
    {
        $encuesta = Encuesta::findOrFail($id);
        $encuesta->delete();
        return response()->json(null, 204);
    }
}
