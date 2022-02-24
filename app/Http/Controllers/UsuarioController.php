<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    //
    public function index()
    {
        //
        $Usuario = User::get();
        return response()->json($Usuario);
    }
}
