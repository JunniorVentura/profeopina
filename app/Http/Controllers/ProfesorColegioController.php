<?php

namespace App\Http\Controllers;

use App\Models\ProfesorColegio;
use Illuminate\Http\Request;

class ProfesorColegioController extends Controller
{
    public function index()
    {
        $profesorColegios = ProfesorColegio::all();
        return response()->json($profesorColegios);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_profesor' => 'required|exists:tbl_profesores,id_profesor',
            'id_colegio' => 'required|exists:tbl_colegios,id_colegio',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date'
        ]);

        $profesorColegio = ProfesorColegio::create($validatedData);
        return response()->json($profesorColegio, 201);
    }

    public function show($id_profesor, $id_colegio, $fecha_inicio)
    {
        $profesorColegio = ProfesorColegio::where([
            ['id_profesor', '=', $id_profesor],
            ['id_colegio', '=', $id_colegio],
            ['fecha_inicio', '=', $fecha_inicio]
        ])->firstOrFail();

        return response()->json($profesorColegio);
    }

    public function update(Request $request, $id_profesor, $id_colegio, $fecha_inicio)
    {
        $profesorColegio = ProfesorColegio::where([
            ['id_profesor', '=', $id_profesor],
            ['id_colegio', '=', $id_colegio],
            ['fecha_inicio', '=', $fecha_inicio]
        ])->firstOrFail();

        $validatedData = $request->validate([
            'fecha_fin' => 'nullable|date'
        ]);

        $profesorColegio->update($validatedData);
        return response()->json($profesorColegio);
    }

    public function destroy($id_profesor, $id_colegio, $fecha_inicio)
    {
        $profesorColegio = ProfesorColegio::where([
            ['id_profesor', '=', $id_profesor],
            ['id_colegio', '=', $id_colegio],
            ['fecha_inicio', '=', $fecha_inicio]
        ])->firstOrFail();

        $profesorColegio->delete();
        return response()->json(null, 204);
    }
}
