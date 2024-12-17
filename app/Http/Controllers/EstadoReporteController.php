<?php

namespace App\Http\Controllers;

use App\Models\EstadoReporte;
use Illuminate\Http\Request;

class EstadoReporteController extends Controller
{
    public function index()
    {
        $estados = EstadoReporte::all();
        return response()->json($estados);
    }

    public function store(Request $request)
    {
        $estado = EstadoReporte::create($request->all());
        return response()->json($estado, 201);
    }

    public function show($id)
    {
        $estado = EstadoReporte::findOrFail($id);
        return response()->json($estado);
    }

    public function update(Request $request, $id)
    {
        $estado = EstadoReporte::findOrFail($id);
        $estado->update($request->all());
        return response()->json($estado);
    }

    public function destroy($id)
    {
        $estado = EstadoReporte::findOrFail($id);
        $estado->delete();
        return response()->json(null, 204);
    }
}
