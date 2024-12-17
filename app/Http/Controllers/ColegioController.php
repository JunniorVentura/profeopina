<?php

namespace App\Http\Controllers;

use App\Models\Colegio;
use Illuminate\Http\Request;

class ColegioController extends Controller
{
    public function index()
    {
        $colegios = Colegio::all();
        return response()->json($colegios);
    }

    public function store(Request $request)
    {
        $colegio = Colegio::create($request->all());
        return response()->json($colegio, 201);
    }

    public function show($id)
    {
        $colegio = Colegio::findOrFail($id);
        return response()->json($colegio);
    }

    public function update(Request $request, $id)
    {
        $colegio = Colegio::findOrFail($id);
        $colegio->update($request->all());
        return response()->json($colegio);
    }

    public function destroy($id)
    {
        $colegio = Colegio::findOrFail($id);
        $colegio->delete();
        return response()->json(null, 204);
    }
}
