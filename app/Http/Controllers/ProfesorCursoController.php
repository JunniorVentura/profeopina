<?php

namespace App\Http\Controllers;

use App\Models\ProfesorCurso;
use Illuminate\Http\Request;

class ProfesorCursoController extends Controller
{
    public function index()
    {
        $profesorCursos = ProfesorCurso::with(['profesor', 'curso', 'colegio'])->get();
        return response()->json($profesorCursos);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_profesor' => 'required|exists:tbl_profesores,id_profesor',
            'id_curso' => 'required|exists:tbl_cursos,id_curso',
            'id_colegio' => 'required|exists:tbl_colegios,id_colegio',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date'
        ]);

        $profesorCurso = ProfesorCurso::create($validatedData);
        return response()->json($profesorCurso, 201);
    }

    public function show($id_profesor, $id_curso, $id_colegio)
    {
        $profesorCurso = ProfesorCurso::where([
            ['id_profesor', '=', $id_profesor],
            ['id_curso', '=', $id_curso],
            ['id_colegio', '=', $id_colegio]
        ])->firstOrFail();

        return response()->json($profesorCurso);
    }

    public function update(Request $request, $id_profesor, $id_curso, $id_colegio)
    {
        $profesorCurso = ProfesorCurso::where([
            ['id_profesor', '=', $id_profesor],
            ['id_curso', '=', $id_curso],
            ['id_colegio', '=', $id_colegio]
        ])->firstOrFail();

        $validatedData = $request->validate([
            'fecha_fin' => 'nullable|date'
        ]);

        $profesorCurso->update($validatedData);
        return response()->json($profesorCurso);
    }

    public function destroy($id_profesor, $id_curso, $id_colegio)
    {
        $profesorCurso = ProfesorCurso::where([
            ['id_profesor', '=', $id_profesor],
            ['id_curso', '=', $id_curso],
            ['id_colegio', '=', $id_colegio]
        ])->firstOrFail();

        $profesorCurso->delete();
        return response()->json(null, 204);
    }
}
