<?php

namespace App\Http\Controllers;

use App\Models\maestros;
use App\Models\materias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MaestrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $maestro = maestros::get();
        return response()->json($maestro);
    }
    public function maestrosSinAsignatura(){
       $ttt = DB::table('maestros')->select()->whereNotIn('id', DB::table('materias')->select('maestro_id'))
       ->get();
       return response()->json($ttt);
    }
}
