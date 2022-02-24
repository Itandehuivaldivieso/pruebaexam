<?php

namespace App\Http\Controllers;

use App\Models\materias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = DB::table('materias')
        ->join('maestros', 'maestros.id', '=', 'materias.maestro_id')
        ->select('materias.*','maestros.*')
        ->orderBy('materias.nombre')
        ->get();
        return response()->json($users);
    }
    public function obtenerMaterias(){
        $Usuario = materias::get();
        return response()->json($Usuario);
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
        Materias::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function show(materias $materias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, materias $materias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function destroy(materias $materias)
    {
        //
    }
}
