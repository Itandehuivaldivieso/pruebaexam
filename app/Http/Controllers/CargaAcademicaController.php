<?php

namespace App\Http\Controllers;

use App\Models\cargaAcademica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CargaAcademicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = DB::table('carga_academicas')
        ->join('users', 'users.id', '=', 'carga_academicas.user_id')
        ->join('materias', 'materias.id', '=', 'carga_academicas.materia_id')
        ->join('maestros', 'materias.maestro_id','=','maestros.id')
        ->select('users.id as id_alumno','users.name as nombreAlumno' , 'materias.*', 'maestros.nombre as maestro')
        ->orderBy('users.id')
        ->get();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
        cargaAcademica::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cargaAcademica  $cargaAcademica
     * @return \Illuminate\Http\Response
     */
    public function show(cargaAcademica $cargaAcademica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cargaAcademica  $cargaAcademica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cargaAcademica $cargaAcademica)
    {
        //
        $cargaAcademica->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cargaAcademica  $cargaAcademica
     * @return \Illuminate\Http\Response
     */
    public function destroy(cargaAcademica $cargaAcademica)
    {
        //
        $cargaAcademica-> delete();
    }
}
