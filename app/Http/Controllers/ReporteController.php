<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReporteController extends Controller
{
    public function index()
    {
        $reportes = Reporte::with(['reportante', 'perfilReportado', 'encuestaReportada', 'estadoReporte'])->get();
        return response()->json($reportes);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_reportante' => 'required|exists:tbl_usuarios,id_usuario',
            'id_perfil_reportado' => 'nullable|exists:tbl_usuarios,id_usuario',
            'id_encuesta_reportado' => 'nullable|exists:tbl_encuestas,id_encuesta',
            'motivo' => 'required|string|max:255',
            'id_estado_reporte' => 'required|exists:tbl_estado_reporte,id_estado_reporte'
        ]);

        if (is_null($validatedData['id_perfil_reportado']) && is_null($validatedData['id_encuesta_reportado'])) {
            return response()->json(['error' => 'Debe especificar un perfil o una encuesta a reportar.'], 422);
        }

        $reporte = Reporte::create($validatedData);
        return response()->json($reporte, 201);
    }

    public function show($id)
    {
        $reporte = Reporte::with(['reportante', 'perfilReportado', 'encuestaReportada', 'estadoReporte'])->findOrFail($id);
        return response()->json($reporte);
    }

    public function update(Request $request, $id)
    {
        $reporte = Reporte::findOrFail($id);

        $validatedData = $request->validate([
            'id_perfil_reportado' => 'nullable|exists:tbl_usuarios,id_usuario',
            'id_encuesta_reportado' => 'nullable|exists:tbl_encuestas,id_encuesta',
            'motivo' => 'sometimes|required|string|max:255',
            'id_estado_reporte' => 'sometimes|required|exists:tbl_estado_reporte,id_estado_reporte'
        ]);

        if (is_null($validatedData['id_perfil_reportado']) && is_null($validatedData['id_encuesta_reportado'])) {
            return response()->json(['error' => 'Debe especificar un perfil o una encuesta a reportar.'], 422);
        }

        $reporte->update($validatedData);
        return response()->json($reporte);
    }

    public function destroy($id)
    {
        $reporte = Reporte::findOrFail($id);
        $reporte->delete();
        return response()->json(null, 204);
    }
}
