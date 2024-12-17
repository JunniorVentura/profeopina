<?php

namespace App\Http\Controllers;

use App\Models\EstadoPerfil;
use Illuminate\Http\Request;

class EstadoPerfilController extends Controller
{
    public function index()
    {
        $estados = EstadoPerfil::all();
        return response()->json($estados);
    }

    public function store(Request $request)
    {
        $estado = EstadoPerfil::create($request->all());
        return response()->json($estado, 201);
    }

    public function show($id)
    {
        $estado = EstadoPerfil::findOrFail($id);
        return response()->json($estado);
    }

    public function update(Request $request, $id)
    {
        $estado = EstadoPerfil::findOrFail($id);
        $estado->update($request->all());
        return response()->json($estado);
    }

    public function destroy($id)
    {
        $estado = EstadoPerfil::findOrFail($id);
        $estado->delete();
        return response()->json(null, 204);
    }
}
