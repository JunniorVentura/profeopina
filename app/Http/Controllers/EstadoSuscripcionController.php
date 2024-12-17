<?php

namespace App\Http\Controllers;

use App\Models\EstadoSuscripcion;
use Illuminate\Http\Request;

class EstadoSuscripcionController extends Controller
{
    public function index()
    {
        $estados = EstadoSuscripcion::all();
        return response()->json($estados);
    }

    public function store(Request $request)
    {
        $estado = EstadoSuscripcion::create($request->all());
        return response()->json($estado, 201);
    }

    public function show($id)
    {
        $estado = EstadoSuscripcion::findOrFail($id);
        return response()->json($estado);
    }

    public function update(Request $request, $id)
    {
        $estado = EstadoSuscripcion::findOrFail($id);
        $estado->update($request->all());
        return response()->json($estado);
    }

    public function destroy($id)
    {
        $estado = EstadoSuscripcion::findOrFail($id);
        $estado->delete();
        return response()->json(null, 204);
    }
}
