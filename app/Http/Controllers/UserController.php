<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Mostra todos os usuários cadastrados
     */
    public function index()
    {
        return response()->json(User::all());
    }
}