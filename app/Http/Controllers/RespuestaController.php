<?php

namespace App\Http\Controllers;

use App\Models\Respuesta;
use Illuminate\Http\Request;

class RespuestaController extends Controller
{
    public function index()
    {
        $respuestas = Respuesta::with(['encuesta', 'usuario'])->get();
        return response()->json($respuestas);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_encuesta' => 'required|exists:tbl_encuestas,id_encuesta',
            'id_usuario' => 'required|exists:tbl_usuarios,id_usuario',
            'texto_respuesta' => 'required|string|max:500'
        ]);

        $respuesta = Respuesta::create($validatedData);
        return response()->json($respuesta, 201);
    }

    public function show($id)
    {
        $respuesta = Respuesta::with(['encuesta', 'usuario'])->findOrFail($id);
        return response()->json($respuesta);
    }

    public function update(Request $request, $id)
    {
        $respuesta = Respuesta::findOrFail($id);

        $validatedData = $request->validate([
            'texto_respuesta' => 'sometimes|required|string|max:500'
        ]);

        $respuesta->update($validatedData);
        return response()->json($respuesta);
    }

    public function destroy($id)
    {
        $respuesta = Respuesta::findOrFail($id);
        $respuesta->delete();
        return response()->json(null, 204);
    }
}
