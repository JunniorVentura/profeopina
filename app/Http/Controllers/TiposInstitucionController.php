<?php

namespace App\Http\Controllers;

use App\Models\TiposInstitucion;
use Illuminate\Http\Request;

class TiposInstitucionController extends Controller
{
    public function index()
    {
        $tipos = TiposInstitucion::all();
        return response()->json($tipos);
    }

    public function store(Request $request)
    {
        $tipo = TiposInstitucion::create($request->all());
        return response()->json($tipo, 201);
    }

    public function show($id)
    {
        $tipo = TiposInstitucion::findOrFail($id);
        return response()->json($tipo);
    }

    public function update(Request $request, $id)
    {
        $tipo = TiposInstitucion::findOrFail($id);
        $tipo->update($request->all());
        return response()->json($tipo);
    }

    public function destroy($id)
    {
        $tipo = TiposInstitucion::findOrFail($id);
        $tipo->delete();
        return response()->json(null, 204);
    }
}
