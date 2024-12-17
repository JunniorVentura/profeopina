<?php

namespace App\Http\Controllers;

use App\Models\Suscripcion;
use Illuminate\Http\Request;

class SuscripcionController extends Controller
{
    public function index()
    {
        $suscripciones = Suscripcion::with(['usuario', 'estadoSuscripcion'])->get();
        return response()->json($suscripciones);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_usuario' => 'required|exists:tbl_usuarios,id_usuario',
            'tipo_suscripcion' => 'required|string|max:50',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
            'id_estado_suscripcion' => 'required|exists:tbl_estado_suscripcion,id_estado_suscripcion'
        ]);

        $suscripcion = Suscripcion::create($validatedData);
        return response()->json($suscripcion, 201);
    }

    public function show($id)
    {
        $suscripcion = Suscripcion::with(['usuario', 'estadoSuscripcion'])->findOrFail($id);
        return response()->json($suscripcion);
    }

    public function update(Request $request, $id)
    {
        $suscripcion = Suscripcion::findOrFail($id);

        $validatedData = $request->validate([
            'tipo_suscripcion' => 'sometimes|required|string|max:50',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
            'id_estado_suscripcion' => 'sometimes|required|exists:tbl_estado_suscripcion,id_estado_suscripcion'
        ]);

        $suscripcion->update($validatedData);
        return response()->json($suscripcion);
    }

    public function destroy($id)
    {
        $suscripcion = Suscripcion::findOrFail($id);
        $suscripcion->delete();
        return response()->json(null, 204);
    }
}
