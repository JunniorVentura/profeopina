<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstadoCuentaController;
use App\Http\Controllers\EstadoPerfilController;
use App\Http\Controllers\EstadoReporteController;
use App\Http\Controllers\EstadoSuscripcionController;
use App\Http\Controllers\TiposInstitucionController;
use App\Http\Controllers\ColegioController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AlumnoColegioController;
use App\Http\Controllers\ProfesorColegioController;
use App\Http\Controllers\AlumnoCursoController;
use App\Http\Controllers\ProfesorCursoController;
use App\Http\Controllers\UsuarioRolController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\RespuestaController;
use App\Http\Controllers\SuscripcionController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Añadir las rutas de autenticación
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

//Ruta de Estados
Route::resource('estado-cuenta', EstadoCuentaController::class);
Route::resource('estado-perfil', EstadoPerfilController::class);
Route::resource('estado-reporte', EstadoReporteController::class);
Route::resource('estado-suscripcion', EstadoSuscripcionController::class);
Route::resource('tipos-institucion', TiposInstitucionController::class);

//Colegio
Route::resource('colegios', ColegioController::class);

//Gestión de Usuarios
Route::resource('roles', RolesController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('alumnos', AlumnoController::class);
Route::resource('profesores', ProfesorController::class);

//Cursos
Route::resource('cursos', CursoController::class);

//Encuesta
Route::resource('encuestas', EncuestaController::class);

//Respuesta
Route::resource('respuestas', RespuestaController::class);

//Suscripciones
Route::resource('suscripciones', SuscripcionController::class);

//Tablas relacionales
Route::get('alumno-colegio', [AlumnoColegioController::class, 'index']); 
Route::post('alumno-colegio', [AlumnoColegioController::class, 'store']); 
Route::get('alumno-colegio/{id_alumno}/{id_colegio}/{fecha_inicio}', [AlumnoColegioController::class, 'show']); 
Route::put('alumno-colegio/{id_alumno}/{id_colegio}/{fecha_inicio}', [AlumnoColegioController::class, 'update']); 
Route::delete('alumno-colegio/{id_alumno}/{id_colegio}/{fecha_inicio}', [AlumnoColegioController::class, 'destroy']);

Route::get('profesor-colegio', [ProfesorColegioController::class, 'index']); 
Route::post('profesor-colegio', [ProfesorColegioController::class, 'store']); 
Route::get('profesor-colegio/{id_profesor}/{id_colegio}/{fecha_inicio}', [ProfesorColegioController::class, 'show']); 
Route::put('profesor-colegio/{id_profesor}/{id_colegio}/{fecha_inicio}', [ProfesorColegioController::class, 'update']); 
Route::delete('profesor-colegio/{id_profesor}/{id_colegio}/{fecha_inicio}', [ProfesorColegioController::class, 'destroy']);

Route::get('alumno-curso', [AlumnoCursoController::class, 'index']); 
Route::post('alumno-curso', [AlumnoCursoController::class, 'store']); 
Route::get('alumno-curso/{id_alumno}/{id_curso}/{id_colegio}', [AlumnoCursoController::class, 'show']); 
Route::put('alumno-curso/{id_alumno}/{id_curso}/{id_colegio}', [AlumnoCursoController::class, 'update']); 
Route::delete('alumno-curso/{id_alumno}/{id_curso}/{id_colegio}', [AlumnoCursoController::class, 'destroy']);

Route::get('profesor-curso', [ProfesorCursoController::class, 'index']);
Route::post('profesor-curso', [ProfesorCursoController::class, 'store']);
Route::get('profesor-curso/{id_profesor}/{id_curso}/{id_colegio}', [ProfesorCursoController::class, 'show']);
Route::put('profesor-curso/{id_profesor}/{id_curso}/{id_colegio}', [ProfesorCursoController::class, 'update']);
Route::delete('profesor-curso/{id_profesor}/{id_curso}/{id_colegio}', [ProfesorCursoController::class, 'destroy']);

Route::get('usuario-rol', [UsuarioRolController::class, 'index']);
Route::post('usuario-rol', [UsuarioRolController::class, 'store']);
Route::get('usuario-rol/{id_usuario}/{id_rol}', [UsuarioRolController::class, 'show']);
Route::put('usuario-rol/{id_usuario}/{id_rol}', [UsuarioRolController::class, 'update']);
Route::delete('usuario-rol/{id_usuario}/{id_rol}', [UsuarioRolController::class, 'destroy']);







