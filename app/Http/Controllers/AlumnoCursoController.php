<?php

namespace App\Http\Controllers;

use App\Models\AlumnoCurso;
use Illuminate\Http\Request;

class AlumnoCursoController extends Controller
{
    public function index()
    {
        $alumnoCursos = AlumnoCurso::with(['alumno', 'curso', 'colegio'])->get();
        return response()->json($alumnoCursos);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_alumno' => 'required|exists:tbl_alumnos,id_alumno',
            'id_curso' => 'required|exists:tbl_cursos,id_curso',
            'id_colegio' => 'required|exists:tbl_colegios,id_colegio',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date',
            'aprobado' => 'required|boolean',
            'calificacion' => 'nullable|numeric|min:0|max:100'
        ]);

        $alumnoCurso = AlumnoCurso::create($validatedData);
        return response()->json($alumnoCurso, 201);
    }

    public function show($id_alumno, $id_curso, $id_colegio)
    {
        $alumnoCurso = AlumnoCurso::where([
            ['id_alumno', '=', $id_alumno],
            ['id_curso', '=', $id_curso],
            ['id_colegio', '=', $id_colegio]
        ])->firstOrFail();

        return response()->json($alumnoCurso);
    }

    public function update(Request $request, $id_alumno, $id_curso, $id_colegio)
    {
        $alumnoCurso = AlumnoCurso::where([
            ['id_alumno', '=', $id_alumno],
            ['id_curso', '=', $id_curso],
            ['id_colegio', '=', $id_colegio]
        ])->firstOrFail();

        $validatedData = $request->validate([
            'fecha_fin' => 'nullable|date',
            'aprobado' => 'sometimes|required|boolean',
            'calificacion' => 'nullable|numeric|min:0|max:100'
        ]);

        $alumnoCurso->update($validatedData);
        return response()->json($alumnoCurso);
    }

    public function destroy($id_alumno, $id_curso, $id_colegio)
    {
        $alumnoCurso = AlumnoCurso::where([
            ['id_alumno', '=', $id_alumno],
            ['id_curso', '=', $id_curso],
            ['id_colegio', '=', $id_colegio]
        ])->firstOrFail();

        $alumnoCurso->delete();
        return response()->json(null, 204);
    }
}
