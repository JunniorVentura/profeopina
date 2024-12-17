<?php

namespace App\Http\Controllers;

use App\Models\AlumnoColegio;
use Illuminate\Http\Request;

class AlumnoColegioController extends Controller
{
    public function index()
    {
        $alumnoColegios = AlumnoColegio::all();
        return response()->json($alumnoColegios);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_alumno' => 'required|exists:tbl_alumnos,id_alumno',
            'id_colegio' => 'required|exists:tbl_colegios,id_colegio',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date'
        ]);

        $alumnoColegio = AlumnoColegio::create($validatedData);
        return response()->json($alumnoColegio, 201);
    }

    public function show($id_alumno, $id_colegio, $fecha_inicio)
    {
        $alumnoColegio = AlumnoColegio::where([
            ['id_alumno', '=', $id_alumno],
            ['id_colegio', '=', $id_colegio],
            ['fecha_inicio', '=', $fecha_inicio]
        ])->firstOrFail();

        return response()->json($alumnoColegio);
    }

    public function update(Request $request, $id_alumno, $id_colegio, $fecha_inicio)
    {
        $alumnoColegio = AlumnoColegio::where([
            ['id_alumno', '=', $id_alumno],
            ['id_colegio', '=', $id_colegio],
            ['fecha_inicio', '=', $fecha_inicio]
        ])->firstOrFail();

        $validatedData = $request->validate([
            'fecha_fin' => 'nullable|date'
        ]);

        $alumnoColegio->update($validatedData);
        return response()->json($alumnoColegio);
    }

    public function destroy($id_alumno, $id_colegio, $fecha_inicio)
    {
        $alumnoColegio = AlumnoColegio::where([
            ['id_alumno', '=', $id_alumno],
            ['id_colegio', '=', $id_colegio],
            ['fecha_inicio', '=', $fecha_inicio]
        ])->firstOrFail();

        $alumnoColegio->delete();
        return response()->json(null, 204);
    }
}
