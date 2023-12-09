<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUsuarios()
    {
        $usuarios = DB::table('users')
            ->join('user_domicilios', 'users.id', '=', 'user_domicilios.user_id')
            ->select('users.name as nombre', 'user_domicilios.domicilio', 'users.fecha_nacimento', DB::raw('FLOOR(DATEDIFF(NOW(), users.fecha_nacimento) / 365) AS edad'))
            ->get();

        return response()->json($usuarios);
    }
}
