<?php

namespace App\Http\Controllers;

use App\Models\EstadoCuenta;
use Illuminate\Http\Request;

class EstadoCuentaController extends Controller
{
    //
    public function index()
    {
        $estados = EstadoCuenta::all();
        return response()->json($estados);
        
    }
    public function store(Request $request)
    {
        $estado = EstadoCuenta::create($request->all());
        return response()->json($estado, 201);
    }
    public function show($id)
    {
        $estado = EstadoCuenta::findOrFail($id);
        return response()->json($estado);
    }
    public function update(Request $request, $id)
    {
        $estado = EstadoCuenta::findOrFail($id);
        $estado->update($request->all());
        return response()->json($estado);
    }
    public function destroy($id)
    {
        $estado = EstadoCuenta::findOrFail($id);
        $estado->delete();
        return response()->json(null, 204);
    }
}
